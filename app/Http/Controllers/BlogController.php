<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return "Blog";
    }

    public function show(string $post)
    {
        return "Blog post #{$post}";
    }

    public function like(string $post)
    {
        return "Like blog post #{$post}";
    }
}
