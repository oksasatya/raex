<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('pages.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        // $user->confirmed_password = bcrypt($request->confirmed_password);
        $user->save();
        // dd($user);
        return redirect()->route('login')->with('success', 'Berhasil mendaftar, silahkan login');
    }
}