<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate(
            [
                'limit' => ['nullable', 'integer', 'min:1', 'max:99'],
                'page' => ['nullable', 'integer', 'min:1', 'max:100'],
            ]
        );
        $limit = $validated['limit'] ?? 12;

        $category_id = $request->input('category_id');
        $search = $request->input('search');

        $posts = Post::query()
            ->where('published', true)
            ->latest('published_at')
            ->oldest('id')
            ->paginate($limit, ['id', 'title', 'content', 'published_at']);

        $categories = [null => __('Все категории'), 1 => '1', 2 => '2'];

        if ($request->ajax()) {
            return view('blog.partials_index', compact('posts', 'categories'))->render();
        }

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show(string $post_id)
    {
        $post = Post::query()->findOrFail($post_id);
        return view('blog.show', compact('post'));
    }

    public function like(string $post)
    {
        return "Like blog post #{$post}";
    }
}
