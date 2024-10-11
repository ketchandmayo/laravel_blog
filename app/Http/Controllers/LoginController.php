<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login.index');
    }

    public function store(Request $request): never
    {
        $data       =       $request->all();

        $email      =       $request->input('email');
        $password   =       $request->input('password');
        $remember   = (bool)$request->input('remember');

        dd($data);
    }
}
