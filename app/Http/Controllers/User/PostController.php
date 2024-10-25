<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    public function store(StorePostRequest $request)
    {

        $validated = $request->validated();

        $post = Post::query()->create(
            array_merge($validated, [
              'user_id' => User::first()->id,
            ])
        );

//        if(true)
//        {
//            throw ValidationException::withMessages([
//                'account' => __('Недостаточно средств'),
//            ]);
//        }

        return redirect()->route('user.posts.show', 132);
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

    public function update(Request $request, $post_id)
    {
        $title = $request->input("title");
        $content = $request->input("content");

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:5000'],
        ]);

        return redirect()->back();
//        return redirect()->route('user.posts.show', $post_id);
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
