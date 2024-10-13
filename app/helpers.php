<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('active_link')) {
    function active_link(string $name, string $class = 'active'): string
    {
        return Route::is($name) ? $class : '';
    }

    function session_alert(string $text, string $type = 'success'): void
    {
        session(['alert' => ['text' => $text, 'type' => $type]]);
    }
}
