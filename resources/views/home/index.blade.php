<x-layout>
    {{-- Existing section --}}
    <section class="intro-section text-center py-20 bg-gray-100">
        <h1 class="text-3xl font-bold text-gray-900">Hello World! I'm Liaw Hang Sheng</h1>
        <p class="text-lg text-gray-700 mt-4">
            I am a final year Computer Science student at Monash University Malaysia.
            I have a passion for development and am excited to learn and grow as a developer.
        </p>
        <p class="mt-2 text-gray-600">
            Feel free to explore my work and projects!
        </p>
    </section>

    {{-- Floating Chatbot Button --}}
    <button
        id="chatbot-toggle"
        class="fixed bottom-4 right-4 bg-blue-600 text-white p-3 rounded-full shadow-lg focus:outline-none hover:bg-blue-700 transition"
        title="Chat with me"
    >
        Chat
    </button>

    {{-- Chatbot Container (hidden by default) --}}
    <div
        id="chatbot-container"
        class="fixed bottom-16 right-4 w-80 bg-white border border-gray-300 rounded-lg shadow-lg p-4 hidden"
        style="max-height: 400px; overflow-y: auto;"
    >
        <h2 class="text-lg font-semibold text-gray-800">Ask Me Anything</h2>
        <hr class="my-2">

        {{-- Response area --}}
        <div id="chatResponse" class="text-gray-700 mb-4 whitespace-pre-wrap"></div>

        {{-- Chat form --}}
        <form id="chatForm" class="space-y-2">
            @csrf
            <label for="user_message" class="block text-sm font-medium text-gray-700">
                Your Message
            </label>
            <textarea
                id="user_message"
                name="user_message"
                rows="2"
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            ></textarea>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition"
            >
                Send
            </button>
        </form>
    </div>

    {{-- Scripts --}}
    <script>
        // Toggle the chatbot container
        const chatbotToggle = document.getElementById('chatbot-toggle');
        const chatbotContainer = document.getElementById('chatbot-container');

        chatbotToggle.addEventListener('click', () => {
            chatbotContainer.classList.toggle('hidden');
        });

        // Handle form submission
        const chatForm = document.getElementById('chatForm');
        const chatResponse = document.getElementById('chatResponse');

        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(chatForm);

            // Clear old response
            chatResponse.textContent = "Thinking...";

            try {
                const response = await fetch('/chat', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error("Network response was not OK");
                }

                const data = await response.json();
                chatResponse.textContent = data.reply || "No reply received.";
            } catch (error) {
                console.error(error);
                chatResponse.textContent = "Error connecting to chatbot.";
            }
        });
    </script>
</x-layout>
