@extends('admin.layouts.app')

@section('title', 'Editar Post')
@section('content')

<a href="{{ route('posts.index') }}">Voltar</a>
    <h1>Editar</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="GET">
        @method('PUT')
        @include('admin._partials.form')
    </form>


@endsection
