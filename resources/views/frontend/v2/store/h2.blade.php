<div class="card m-2" id="{{ $heading->id }}">
    <div class="card-footer text-muted">
        <div class="container-fluid px-0">
            <h2>{{ $heading->title }}</h2>
            <p>{{ $heading->description }}</p>
        </div>
    </div>
    <div class="card-body">
        @php $coupons = $heading->coupons->sortBy('editor_order'); @endphp
        @foreach($coupons as $coupon)
            @include('frontend.v2.store.coupon')
        @endforeach
    </div>
</div>
