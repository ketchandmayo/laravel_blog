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

        $user_id = $request->input('user_id');
        $search = $request->input('search');

        $query = Post::query();
        if($user_id)
            $query->where('user_id', $user_id);
        $query->where([
                'published' => true,
            ])
            ->latest('published_at')
            ->oldest('id');

        $posts = $query->paginate($limit, ['id', 'title', 'content', 'published_at']);

        if ($request->ajax()) {
            return view('blog.partials_index', compact('posts'))->render();
        }
        else {
            $user_id = Post::query()->distinct()->pluck('user_id')->toArray();
            $user_id = array_replace([null => __('Все пользователи')], array_combine($user_id, $user_id));

            return view('blog.index', compact('posts', 'user_id'));
        }


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
