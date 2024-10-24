<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $data       =       $request->all();

        $email      =       $request->input('email');
        $password   =       $request->input('password');
        $remember   = (bool)$request->input('remember');

        session_alert(__('Добро пожаловать').", {$email}", 'info');

        return redirect()->route('user.posts');
    }
}
