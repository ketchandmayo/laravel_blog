<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\User;
use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.register.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ['required', 'string', 'min:3', 'max:255'],
            "email" => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            "phone" => ['required', 'string', new Phone],
            "password" => ['required', 'string', 'confirmed', Password::min(8)->max(255)], /*->letters()->numbers()->mixedCase()*/
            "password_confirmation" => ['required', 'string', 'min:8', 'max:255'],
            "agree" => ['accepted'],
        ]);

        $user = User::query()->create($validated);
        Auth::login($user, true);
        session_alert(__('Добро пожаловать').", {$request->email}", 'success');

        $data = [
            'message' => __('Успешно!'),
            'redirect' => route('user.posts')
        ];

        return response()->json($data);
    }
}
