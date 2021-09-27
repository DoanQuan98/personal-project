<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    function showFormBlog($id) {
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('home.blog', compact('post', 'comments'));
    }
}
