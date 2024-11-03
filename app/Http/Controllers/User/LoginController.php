<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('user.login.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($validated, $remember)) {
            session_alert(__('Добро пожаловать').", {$validated['email']}", 'success');
            $data = [
                'message' => __('Успешно!'),
                'redirect' => route('user.posts')
            ];
            $status = 200;
        }
        else {
            $data = ['message' => __('auth.failed')];
            $data['errors']['password'][] = __('auth.failed');
            $status = 401;
        }
        return response()->json($data, $status);
    }

    public function destroy()
    {
        Auth::logout();

        $data = [
            'message' => __('Успешно!'),
            'redirect' => route('home')
        ];

        return response()->json($data);
    }
}
