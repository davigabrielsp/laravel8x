<h1>Post Index</h1>

<a href="{{ route('posts.create') }}">NOVO POST</a><br>

@if(session('message'))
<div>
    {{ session('message') }}
</div>
@endif
<hr>



@foreach ($posts as $post)
    <p>{{ $post->title}} - <a href="{{ route('posts.show',$post->id ) }}">ABRIR</a> </p>
@endforeach
