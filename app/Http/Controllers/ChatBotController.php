<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatBotController extends Controller
{
    public function getChatResponse(Request $request)
    {
        // Get the user's message from the form
        $userMessage = $request->input('user_message');

        // Get your API key from .env
        $apiKey = env('MIXTRAL_API');

        // Make the POST request to OpenRouter
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$apiKey}",
            'Content-Type'  => 'application/json',
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model'    => 'mistralai/mistral-small-24b-instruct-2501:free',
            'messages' => [
                [
                    'role'    => 'user',
                    'content' => $userMessage,
                ],
            ],
        ]);

        // Parse the JSON response
        $data = $response->json();

        // Extract the chatbot's reply with better error handling
        $reply = $data['choices'][0]['message']['content'] ?? 'Sorry, I could not generate a response.';

        // Add error logging
        if (!$response->successful()) {
            \Log::error('ChatBot API Error:', [
                'status' => $response->status(),
                'response' => $data
            ]);
            return response()->json(['reply' => 'Sorry, there was an error processing your request.'], 500);
        }

        return response()->json(['reply' => $reply]);
    }
}
