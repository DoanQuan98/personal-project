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

    public function post(Request $request, Post $post)
    {
        $path= $request->file('image')->store('images','public');
        $post->image = $path;

        $post->title = $request->title;
        $post->purport = $request->purport;
        $post->user_id = $request->user_id;
        $post->save();
        return redirect()->route('home');
    }

}
