<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $data       =       $request->all();

        $name       =       $request->input('name');
        $email      =       $request->input('email');
        $password   =       $request->input('password');
        $p_confirm  =       $request->input('password_confirmation');
        $agree      = (bool)$request->input('agree');

        if(true)
        {
            return back()->withInput();
        }

        return redirect()->route('user.posts');
    }
}
