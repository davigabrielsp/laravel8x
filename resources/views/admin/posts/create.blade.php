@extends('admin.layouts.app')

@section('title', 'NOVO POST')
@section('content')

    <h1>Create</h1>
    <a href="{{ route('posts.index') }}">VOLTAR</a>
    <hr>

    <form action="{{ route('posts.store') }}" method="POST">
        @include('admin._partials.form')
    </form>

@endsection
