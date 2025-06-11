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
       $posts = Post::orderBy('id', 'ASC')->paginate(1);
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
    public function edit($id)
    {

        if(!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }

        return view('admin.posts.edit', compact('post'));
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
    public function update(StoreUpdatePost $request,$id)
    {
        if(!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }

        $post->update($request->all());

        return redirect()->route('posts.index')->with('message', 'post atualizado com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
       $posts = Post::where('title', '=', $request->search)
       ->orWhere('content', 'LIKE', "%{$request->search}%")
       ->paginate(1);

       return view('admin.posts.index', compact('posts', 'filters'));
    }
}
