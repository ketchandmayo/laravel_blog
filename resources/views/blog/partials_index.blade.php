<div class="row">
    @foreach($posts as $post)
        <div class="col-12 col-md-4">
            <x-post.card :post="$post" />
        </div>

    @endforeach
</div>
<div class="pagination">
    {{ $posts->links() }}
</div>

