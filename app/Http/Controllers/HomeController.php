<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    function index()
    {
        $posts = Post::all();
        return view('home.home', compact('posts'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back();
    }

    public function getSearch(Request $request)
    {
        return view('home.home');
    }

    function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('post')
                ->where('title', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '
               <li><a href="data/'. $row->user_id .'">'.$row->title.'</a></li>
               ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
