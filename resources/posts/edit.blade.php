@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $post->name) }}">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}">
            @error('slug')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="extract">Extract</label>
            <input type="text" name="extract" id="extract" value="{{ old('extract', $post->extract) }}">
            @error('extract')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="body">Body</label>
            <textarea name="body" id="body">{{ old('body', $post->body) }}</textarea>
            @error('body')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="status">Status</label>
            <input type="text" name="status" id="status" value="{{ old('status', $post->status) }}">
            @error('status')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="tags">Tags</label>
            <select name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('tags')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Update Post</button>
    </form>
@endsection
