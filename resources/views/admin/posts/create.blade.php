<h1>Create</h1>
<a href="{{ route('posts.index') }}">VOLTAR</a>
<hr>

@if($errors->any())
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
   </ul>
@endif


<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <input type="text" name="title" id="" placeholder="title" value="{{ old('title') }}"><br>
    <input type="text" name="content" id="" placeholder="conteudo" value="{{ old('content') }}"><br>
    <input type="submit" value="ENVIAR">
</form>
