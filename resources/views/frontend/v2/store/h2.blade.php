<div class="my-2" id="{{ $heading->id }}">
    <div class="container-fluid px-0">
        <h2>{{ $heading->title }}</h2>
        <p>{{ $heading->description }}</p>
    </div>
    @php $coupons = $heading->coupons->sortBy('editor_order'); @endphp
    @foreach($coupons as $coupon)
        @include('frontend.v2.store.coupon')
    @endforeach
</div>
