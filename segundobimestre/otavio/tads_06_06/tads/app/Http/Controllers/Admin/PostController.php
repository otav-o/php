<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
       $data = $request->all();
       $data['user_id'] = 1;
       $data['is_active'] = true;

       Post::create($data);
    
       return redirect()->route('posts.index');
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }
    
    public function update(Post $post, Request $request)
    {
        $data = $request->all();
        $post->update($data);
        return redirect()->route('posts.index');
    }
    
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
