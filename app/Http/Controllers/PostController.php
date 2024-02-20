<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('home', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('post', compact('post'));
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
