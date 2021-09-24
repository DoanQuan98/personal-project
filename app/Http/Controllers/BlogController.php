<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function showFormBlog($id) {
        $posts = Post::find($id);
        return view('home.blog', compact('posts'));
    }
}
