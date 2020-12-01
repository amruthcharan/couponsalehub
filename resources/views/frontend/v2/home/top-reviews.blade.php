<div class="u-bg-white p-3">
    <h2 class="mb-3 text-center">Top Reviews</h2>
    <div class="row">
        @foreach($top as $store)
            <div class="col-md-3">
                @include('frontend.v2.partials.top-review')
            </div>
        @endforeach
    </div>
</div>
