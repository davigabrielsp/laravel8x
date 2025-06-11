@extends('admin.layouts.app')

@section('title', 'Pagina Home')
@section('content')

    <h1>Post Index</h1>

    <a href="{{ route('posts.create') }}">NOVO POST</a><br>

    @if(session('message'))
    <div>
        {{ session('message') }}
    </div>
    @endif
    <hr>

    <form action="{{ route('posts.search') }}" method="post">
        @csrf
        <input type="text" name="search"  placeholder="Pesquisar">
        <input type="submit" value="FILTRAR">
    </form>


    @foreach ($posts as $post)
        {{ $post->title}} -
        <a href="{{ route('posts.show',$post->id ) }}">ABRIR</a>
        <a href="{{ route('posts.edit',$post->id ) }}">EDITAR</a>
        <hr>
    @endforeach

    <hr>
    @if (isset($filters))
        {{$posts->appends($filters)->links() }}
    @else
        {{$posts->links() }}
    @endif

@endsection


