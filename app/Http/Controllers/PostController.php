<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    public function index()
    {
        $post = (object)[
            'id' => 132,
            'title' => 'lorem ipsum title',
            'content' => 'lorem ipsum <strong>content</strong>',
        ];
        $posts = array_fill(0, 40, $post);

        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function store()
    {
        return 'store';
    }

    public function show($post_id)
    {
        $post = (object)[
            'id' => 132,
            'title' => 'lorem ipsum title',
            'content' => 'lorem ipsum <strong>content</strong>',
        ];

        return view('user.posts.show', compact('post'));
    }

    public function edit($post_id)
    {
        return view('user.posts.edit', compact('post'));
    }

    public function update()
    {
        return 'update';
    }

    public function destroy()
    {
        return 'delete';
    }

    public function like()
    {
        return 'like';
    }
}
