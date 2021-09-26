<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    function showFormLogin()
    {
        return view('auth.login');
    }

    function login(loginRequest $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('home');
        } else {
            session()->flash('error-login', 'Account not exist!');
            return back();
        }
    }

    function showFormRegister()
    {
        return view('auth.register');
    }

    public function register(User $user,RegisterRequest $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = $request->role;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('image', 'public');
            $user->avatar = $path;
        }
        $user->save();

        Session::flash('success', 'Sign Up Success');
        return redirect()->route('auth.showFormLogin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.showFormLogin');
    }


}
