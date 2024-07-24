@extends('layouts.app')

@section('content')
    <h1>Editar Categoría</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}">
        </div>
        <div>
            <label for="description">Descripción:</label>
            <textarea name="description" id="description">{{ $category->description }}</textarea>
        </div>
        <button type="submit">Actualizar</button>
    </form>
@endsection
