<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
       $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request)
    {
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
       // pode usar o where $posts = Post::where('id',$id)->first();
        if(!$posts = Post::find($id)){
            return redirect()->route('posts.index');
        }

        return view('admin.posts.show', compact('posts'));
    }

    public function destroy($id)
    {
        if(!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }

        $post->delete();
            return redirect()->route('posts.index')
            ->with('message', 'DELETADO COM SUCESSO');
    }
}
