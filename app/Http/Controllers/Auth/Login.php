<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    //
    public function __construct()
    {
    }

    public function index()
    {
        return view('layouts.login');
    }

    public function store(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('message', 'Invalid login credentials');
        }
        return redirect()->intended(route('home'));
    }
}
