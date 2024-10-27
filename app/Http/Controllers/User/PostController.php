<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate(
            [
                'limit' => ['nullable', 'integer', 'min:1', 'max:99'],
                'page' => ['nullable', 'integer', 'min:1', 'max:100'],
            ]
        );
        $limit = $validated['limit'] ?? 7;

        $posts = Post::query()
            ->latest('published_at')
            ->paginate($limit);

        if ($request->ajax()) {
            return view('user.posts.partials_index', compact('posts'))->render();
        }

        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {

        return view('user.posts.create');
    }

    public function store(StorePostRequest $request)
    {

        $validated = $request->validated();

        $post = Post::query()->create(
            array_merge($validated, [
              'user_id' => User::first()->id,
            ])
        );

        $data = [
            'message' => __('Успешно!'),
            'redirect' => route('user.posts.show', $post->id)
        ];

        return response()->json($data);
    }

    public function show($post_id, Request $request)
    {
        $post = Post::query()->findOrFail($post_id);

        return view('user.posts.show', compact('post'));
    }

    public function edit($post_id, Request $request)
    {
        $post = Post::query()->findOrFail($post_id);
        return view('user.posts.edit', compact('post'));
    }

    public function update(StorePostRequest $request, $post_id)
    {
        $validated = $request->validated();

        if (!isset($validated['published'])) {
            $validated['published'] = false;
        }

        $post = Post::query()->findOrFail($post_id);
        $post->update($validated);

        $data = [
            'message' => __('Успешно!'),
            'redirect' => route('user.posts.show', $post->id)
        ];

        return response()->json($data);
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
