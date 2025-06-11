@extends('admin.layouts.app')

@section('title', 'Visualizar Post')
@section('content')

    <h1>mostrar</h1>
    <a href="{{ route('posts.index') }}">VOLTAR</a><br>
    <p>
        {{ $posts->title }}
        {{ $posts->content }}
    </p>

    <form action="{{ route('posts.destroy', $posts->id) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="REMOVER O POST">
    </form>


@endsection
