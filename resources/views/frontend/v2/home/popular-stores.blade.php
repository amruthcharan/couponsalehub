<div class="u-bg-white p-3">
    <h2 class="mb-3 text-center">Popular Stores</h2>
    <div class="row">
        @foreach($popular as $store)
            <div class="col-md-2">
                @include('frontend.v2.partials.popular-store')
            </div>
        @endforeach
    </div>
</div>
