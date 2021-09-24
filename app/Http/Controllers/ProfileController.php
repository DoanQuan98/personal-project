<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function showFormProfile()
    {
        return view('home.profile');
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        session()->flash('update-success', 'Successfully updated information');
        return redirect()->route('home');
    }

    public function showFormChangePassword()
    {
        return view('home.change-password');
    }

    public function changePassword(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            if ($request->newPassword == $request->confirmPassword) {
                $user = User::findOrFail(\auth()->user()->id);
                $user->password = Hash::make($request->newPassword);
                $user->save();
                session()->flash('success-change', 'Change password to public');
                return redirect()->route('auth.profile');
            } else {
                session()->flash('not-match', 'New password and confirm new password do not match');
                return back();
            }
        } else {
            session()->flash('wrong-password', 'Current password is wrong');
            return back();
        }
    }
}
