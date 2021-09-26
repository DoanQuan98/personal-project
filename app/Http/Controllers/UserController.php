<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUser()
    {
        $users = User::all();
        return view('home.admin.list', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user = User::where('id',$id)->first()->delete();

        return redirect()->route('user.index');
    }

    public function searchUser(Request $request)
    {
        $keyword = $request->input('search');
        $users = User::where('name','LIKE','%'.$keyword.'%')->paginate(2);
        return view('home.admin.list', compact('users'));
    }

    function getAll()
    {
        $posts = Post::all();
        return view('home.admin.list-post', compact('posts'));
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
