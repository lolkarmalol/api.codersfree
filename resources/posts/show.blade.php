@extends('layouts.app')

@section('title', $post->name)

@section('content')
    <h1>{{ $post->name }}</h1>
    <p>{{ $post->extract }}</p>
    <p>{{ $post->body }}</p>
    <p>Status: {{ $post->status }}</p>
    <p>Category: {{ $post->category->name }}</p>
    <p>Tags:
        @foreach($post->tags as $tag)
            {{ $tag->name }}
        @endforeach
    </p>
    <p>Author: {{ $post->user->name }}</p>
    <a href="{{ route('posts.index') }}">Back to Posts</a>
@endsection
