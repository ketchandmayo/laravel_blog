<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $title = $request->input("title");
        $content = $request->input("content");

        dd($request);
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
        $post = (object)[
            'id' => 132,
            'title' => 'lorem ipsum title',
            'content' => 'lorem ipsum <strong>content</strong>',
        ];
        return view('user.posts.edit', compact('post'));
    }

    public function update(Request $request)
    {
        $title = $request->input("title");
        $content = $request->input("content");

        dd($request);
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
