@extends('layouts.app')

@section('content')
    <h1>Crear Categoría</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="description">Descripción:</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <button type="submit">Guardar</button>
    </form>
@endsection
