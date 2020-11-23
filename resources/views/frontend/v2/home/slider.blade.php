<div class="col-md-6">
    <div class="header-slider normal-slider">
        @foreach($slider as $post)
            <div class="header-slider-item">
                <img src="{{ image($post['image']) }}" alt="{{$post['title']}}" width="685px" height="400px" />
                <div class="header-slider-caption">
                    <a href="{{ route('page', $post['slug']) }}" class="u-slider-text">{{$post['title']}}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
