<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('posts.create', compact('categories', 'tags', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:posts,slug',
            'extract' => 'required',
            'body' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'tags' => 'required|array'
        ]);

        $post = Post::create($request->all());
        $post->tags()->attach($request->tags);

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'extract' => 'required',
            'body' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'tags' => 'required|array'
        ]);

        $post->update($request->all());
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
