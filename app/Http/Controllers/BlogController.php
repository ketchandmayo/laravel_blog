<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();

        $category_id = $request->input('category_id');
        $search = $request->input('search');

        $post = (object)[
            'id' => 132,
            'title' => 'lorem ipsum title',
            'content' => 'lorem ipsum <strong>content</strong>',
            'category_id' => 1,
        ];
        $posts = array_fill(0, 40, $post);
        $posts = array_filter($posts, function ($post) use ($search, $category_id) {
            if($search && !str_contains(strtolower($post->content), strtolower($search)))
                return false;

            if($category_id && $post->category_id != $category_id)
                return false;

            return true;
        });

        $categories = [null => __('Все категории'), 1 => '1', 2 => '2'];

        return view('blog.index', compact('posts', 'categories'));
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
