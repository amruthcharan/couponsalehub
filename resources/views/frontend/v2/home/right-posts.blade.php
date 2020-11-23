<div class="col-md-3">
    <div class="header-img">
        @foreach($right as $post)
        <div class="img-item m-1">
            <img src="{{ image($post['image']) }}" />
            <a class="img-text" href="{{ route('page', $post['slug']) }}">
                <p>{{ $post['title'] }}</p>
            </a>
        </div>
        @endforeach
    </div>
</div>
