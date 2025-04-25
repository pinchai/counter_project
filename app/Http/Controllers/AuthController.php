<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function index(Request $request){
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/admin');
        } else {
            return redirect('/login')
                ->with('status', 'Incorrect Username or password !');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
