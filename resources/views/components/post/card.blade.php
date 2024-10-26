<x-card>
    <x-card-body>
        <div class="ms-3 mt-3 h5">
            <h4>
                <a href="{{route('blog.show', $post->id)}}">
                    {{$post->title}}
                </a>
            </h4>
            <p>
                {!! $post->content !!}
            </p>

            @if($post->published_at)
                <div class="small text-muted">
                   {{ $post->published_at->diffForHumans() }}
                </div>
            @endif
        </div>
    </x-card-body>
</x-card>
