<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class LoginController extends Controller
{
    // has roles trait
    use HasRoles, AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('pages.auth.login');
    }



    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect('/admin');
        } else {
            return redirect('/');
        }
    }

    // logout
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}