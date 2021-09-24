<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function showFormPost()
    {
        return view('home.post');
    }

    function getAll()
    {
        $posts = Post::all();
        return view('home.admin.list-post', compact('posts'));
    }

    public function post(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->purport = $request->purport;
        $post->user_id = $request->user_id;
        $post->save();
        return redirect()->route('home');
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post = Post::where('id',$id)->first()->delete();

        return redirect()->route('post.index');
    }

    public function searchPost(Request $request)
    {
        $keyword = $request->input('search');
        $posts = Post::where('title','LIKE','%'.$keyword.'%')->paginate(2);
        return view('home.admin.list-post', compact('posts'));
    }


}
