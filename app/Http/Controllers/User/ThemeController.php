<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ThemeController extends Controller
{
    function changeTheme(Request $request)
    {
        Cookie::get('theme') == 'dark' ?
            Cookie::queue('theme', 'light')
            :
            Cookie::queue('theme', 'dark');

        return response('', 204);
    }
}
