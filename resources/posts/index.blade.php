@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}">Create New Post</a>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post->id) }}">{{ $post->name }}</a>
                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
