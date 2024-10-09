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

            <div class="small text-muted">
               {{ now()->format('d.m.Y H:i') }}
            </div>
        </div>
    </x-card-body>
</x-card>
