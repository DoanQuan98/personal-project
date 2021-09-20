<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //hiển thị form đăng nhập
    function showFormLogin()
    {
        return view('auth.login');
    }
    //check tải khoản nếu đúng tài khoản sẽ được đưa vào trang home
    function login(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('home');
        } else {
            session()->flash('error-login', 'Account not exist!');
            return back();
        }
    }
    //Hiển thị form đăng ký
    function showFormRegister()
    {
        return view('auth.register');
    }
    //Viết hàm đăng ký rồi đưa lên db đăng ký thành công sẽ chuyển sang trang login
    public function register(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = $request->role;
        $user->save();

        Session::flash('success', 'Sign Up Success');
        return redirect()->route('auth.login');
    }
    //hàm logout ra ngoài
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }


}
