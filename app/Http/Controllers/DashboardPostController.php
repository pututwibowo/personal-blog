<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class DashboardPostController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = Auth::id();
        $validateData['excerpt'] = Str::limit(strip_tags($validateData['body']), 200);

        Post::create($validateData);

        return redirect()->route('posts.index')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (!Gate::allows('is_user', $post)) {
            return redirect()->back();
        }
        return view('dashboard.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (!Gate::allows('is_user', $post)) {
            return redirect()->back();
        }
        return view('dashboard.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if (!Gate::allows('is_user', $post)) {
            return redirect()->back();
        }

        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($post->image) {
                Storage::delete($post->image);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = Auth::id();
        $validateData['excerpt'] = Str::limit(strip_tags($validateData['body']), 200);

        Post::where('id', $post->id)->update($validateData);

        return redirect()->route('posts.index')->with('success', 'Update has been success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (!Gate::allows('is_user', $post)) {
            return redirect()->back();
        }

        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        return redirect()->route('posts.index')->with('success', 'Post has been delete!');
    }
}
