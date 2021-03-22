<div class="p-3">
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-3">
                @include('frontend.v2.partials.popular-post')
            </div>
        @endforeach
    </div>
</div>
