<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'author'])
                    )->paginate(18)->withQueryString(),
            'heading' => 'My Blog',
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store()
    {
        $input = request()->all();

        // If a new category is being created
        if ($input['category_id'] === 'new' && !empty($input['new_category'])) {
            // Create a new category
            $category = Category::create([
                'name' => $input['new_category'],
                'slug' => Str::slug($input['new_category'])
            ]);

            // Update the input to use the new category ID
            $input['category_id'] = $category->id;
        }

        $attributes = validator($input, [
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'thumbnail' => 'required|image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ])->validate();

        dd($attributes);

        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $attributes['user_id'] = auth()->id();

        // Create the post
        Post::create($attributes);

        return redirect('/')->with('success', 'Your post has been published!');
    }

//    public function store()
//    {
//        $attributes = request()->validate([
//            'title' => 'required',
//            'slug' => ['required', Rule::unique('posts', 'slug')],
//            'thumbnail' => 'required|image',
//            'excerpt' => 'required',
//            'body' => 'required',
//            'category_id' => 'nullable|exists:categories,id', // Ensure the category exists if selected
//            'new_category' => 'nullable|unique:categories,name'
//        ]);
//
//        // If a new category is being created
//        if (request('category_id') === 'new' && request('new_category')) {
//            // Create a new category
//            $newCategory = new Category();
//            $newCategory->name = request('new_category');
//            $newCategory->slug = Str::slug(request('new_category'));
//            $newCategory->save();
//
//            // Use the newly created category's ID
//            $attributes['category_id'] = $newCategory->id;
//        }
//
//        // If no category is selected or created, we should stop and ask the user to select one
//        if (!isset($attributes['category_id']) || !Category::find($attributes['category_id'])) {
//            return back()->withErrors(['category_id' => 'Please select a valid category.']);
//        }
//
//        // Process the rest of the post creation
//        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
//        $attributes['user_id'] = auth()->id();
//
//        // Remove the new_category from attributes to avoid saving it to the posts table
//        unset($attributes['new_category']);
//
//        // Create the post
//        Post::create($attributes);
//
//        return redirect('/')->with('success', 'Your post has been published!');
//    }

}
