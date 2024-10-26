<?php

use Illuminate\Support\Carbon;
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

    function dateOrNull(string $date = null, string $format = 'd.m.Y H:i'): ?string
    {
        return (!empty($date)) ? Carbon::parse($date)->format('d.m.Y') : null;
    }

    function checkboxChecked($value = false): false|string
    {
        return $value ? 'checked' : '';
    }

    function validate(array $attributes, array $rules): array
    {
        return validator($attributes, $rules)->validate();
    }
}
