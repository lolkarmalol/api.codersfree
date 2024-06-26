@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}">
            @error('slug')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="extract">Extract</label>
            <input type="text" name="extract" id="extract" value="{{ old('extract') }}">
            @error('extract')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="body">Body</label>
            <textarea name="body" id="body">{{ old('body') }}</textarea>
            @error('body')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="status">Status</label>
            <input type="text" name="status" id="status" value="{{ old('status') }}">
            @error('status')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('tags')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="user_id">User</label>
            <select name="user_id" id="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Create Post</button>
    </form>
@endsection
