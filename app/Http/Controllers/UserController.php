<?php

namespace App\Http\Controllers;

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
}
