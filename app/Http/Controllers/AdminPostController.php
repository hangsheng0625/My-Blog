<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

//    public function store()
//    {
//        Post::create(array_merge($this->validatePost(), [
//            'user_id' => request()->user()->id,
//            'thumbnail' => request()->hasFile('thumbnail')
//            ? request()->file('thumbnail')->store('thumbnails')
//            : null, // Set to null if no thumbnail is uploaded
//        ]));
//
//        return redirect('/');
//    }

    public function store()
    {
        $attributes = $this->validatePost();

        // Remove `new_category` from attributes to prevent it from being included
        unset($attributes['new_category']);

        // Handle thumbnail upload
        if (request()->hasFile('thumbnail')) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        // Add the user ID to the attributes
        $attributes['user_id'] = request()->user()->id;

        // Create the post
        Post::create($attributes);

        return redirect('/')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        $input = request()->all();

        // If a new category is being created
        if ($input['category_id'] === 'new' && !empty($input['new_category'])) {
            // Create a new category
            $category = Category::create([
                'name' => $input['new_category'],
                'slug' => Str::slug($input['new_category'])
            ]);

            // Update the category_id to the new category's ID
            $input['category_id'] = $category->id;
            request()->merge(['category_id' => $category->id]);
        }

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['nullable', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'new_category' => 'nullable' // Add this to allow validation of new category name if needed
        ]);
    }
}
