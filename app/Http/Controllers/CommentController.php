<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function index($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::orderBy('id', 'desc')->where('post_id', $id)->get();
        return view('home.blog', compact('comments', 'post'));
    }

    function comment(Request $request, Comment $comment)
    {
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->save();
        return redirect()->back();
    }

    function delete($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }
}
