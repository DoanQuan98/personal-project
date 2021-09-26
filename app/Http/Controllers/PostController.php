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
        $post->title = $request->title;
        if($request->hasFile('image')){
            $path= $request->file('image')->store('image','public');
            $post->image = $path;
        }
        $post->purport = $request->purport;
        $post->user_id = $request->user_id;
        $post->save();
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back();
    }
}
