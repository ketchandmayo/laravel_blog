<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\User;
use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ['required', 'string', 'min:3', 'max:255'],
            "email" => ['required', 'string', 'email', 'max:255'], /* , 'unique:users' */
//            "phone" => ['required', 'string', new Phone],
            "password" => ['required', 'string', 'confirmed', Password::min(8)->max(255)], /*->letters()->numbers()->mixedCase()*/
            "password_confirmation" => ['required', 'string', 'min:8', 'max:255'],
            "agree" => ['accepted'],
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];
        $user->save();

        dd($request->all());

        return redirect()->route('user.posts');
    }
}
