<div class="container">
    @foreach($posts as $post)
        <div class="mb-5">
            <h2 class="h6 m-0">
                <a href="{{ route('user.posts.show', $post->id) }}">
                    {{ $post->title }}
                </a>
            </h2>

            @if($post->published_at)
                <div class="small text-muted">
                    {{ $post->published_at->diffForHumans() }}
                </div>
            @endif
        </div>
    @endforeach
</div>
<div class="pagination" style="position: sticky; bottom: 0;">
    {{ $posts->links() }}
</div>
