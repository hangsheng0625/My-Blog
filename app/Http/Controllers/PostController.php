<?php

namespace App\Http\Controllers;

use App\Models\Post;

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
//    public function indexByCategory(Category $category)
//    {
//        return view('admin.posts.index', [
//            'posts' => $category->posts()->paginate(10), // Filter posts by category
//            'categories' => Category::all(), // For dropdown menu
//            'currentCategory' => $category // Highlight the selected category
//        ]);
//    }


}
