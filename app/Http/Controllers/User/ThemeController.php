<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    function changeTheme(Request $request)
    {
        if(session('theme') == 'light')
            session(['theme' => 'dark']);
        else
            session(['theme' => 'light']);

        return response('', 204);
    }
}
