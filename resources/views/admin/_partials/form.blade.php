@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

@endif

@csrf
<input type="text" name="title" value="{{ $post->title ?? old('title')}}">
<input type="text" name="content" value="{{ $post->content ?? old('content')}}">
<input type="submit" value="ATUALIZAR">
