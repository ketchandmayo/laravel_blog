<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $post = (object)[
            'id' => 132,
            'title' => 'lorem ipsum title',
            'content' => 'lorem ipsum <strong>content</strong>',
        ];
        $posts = array_fill(0, 40, $post);

        return view('blog.index', compact('posts'));
    }

    public function show(string $post_id)
    {
        $post = (object)[
            'id' => 132,
            'title' => 'lorem ipsum title',
            'content' => 'lorem ipsum <strong>content</strong>',
        ];
        return view('blog.show', compact('post'));
    }

    public function like(string $post)
    {
        return "Like blog post #{$post}";
    }
}
