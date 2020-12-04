@extends('frontend.layouts.v2')

@section('title', $store->seo_title ?? $store->name)
@section('description', $store->seo_description ?? $store->name)
@section('created', $store->created_at->format('Y-m-d\Th:m:sP'))
@section('updated', $store->updated_at->format('Y-m-d\Th:m:sP'))
@section('body')
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="d-sm-none card mb-3 mx-auto">
                    <div class="img-item">
                        <img src="{{ image($store->logo) }}" alt="{{ $store->name }}" width="100%" class="p-3">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <div class="tab-content">
                                <div class="container">
                                    <h1>{{ $store->name . " " . $store->custom_keyword . " " . now()->year }}</h1>
                                    <div class="post-meta">
                                        in <a href="{{ route('page', $store->category->slug) }}" class="category-name">{{ $store->category->name }}</a>
                                        on <span>{{ $store->updated_at->format('d-M-Y') }}</span>
                                    </div>
                                    <button class="btn btn-primary mb-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        MOVE TO
                                    </button>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                            @foreach($store->headings->sortBy('order')->pluck('title', 'id') as $id => $title)
                                            <a href="#{{ $id }}">{{ $title }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="post-body">
                                        {{ $store->first_paragraph }}
                                        <div id="store">
                                            @php $coupons = $store->coupons->where('is_editor_pick', true)->where('heading_id', null)->sortBy('editor_order'); @endphp
                                            <div class="my-2">
                                                @foreach($coupons as $coupon)
                                                    @include('frontend.v2.store.coupon')
                                                @endforeach
                                            </div>
                                            <div class="py-2">
                                                {!! $store->middle_paragraph !!}
                                            </div>
                                            @php $headings = $store->headings->sortBy('order'); @endphp
                                            @foreach($headings as $heading)
                                                @include('frontend.v2.store.h2')
                                            @endforeach
                                            @php $coupons = $store->coupons->where('is_editor_pick', false)->where('heading_id', null)->sortBy('editor_order'); @endphp
                                            <div class="my-2">
                                                @foreach($coupons as $coupon)
                                                    @include('frontend.v2.store.coupon')
                                                @endforeach
                                            </div>
                                        </div>
                                        {!! $store->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar">
                    <div class="d-none d-sm-block card mb-3">
                        <div class="header">
                            <div class="header-img">
                                <div class="img-item m-1">
                                    <img src="{{ image($store->logo) }}" alt="{{ $store->name }}" class="p-3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <h4 class="card-title text-center mt-3">Popular Categories</h4>
                        <div class="header">
                            @include('frontend.v2.home.categories')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="showCoupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="header-text" class="text-center coupon-text"></div>
                        <div class="col-md-9 input-group input-group-lg mt-3 mx-auto">
                            <input type="text" id="coupon" name="coupon" readonly value="" class="form-control text-center font-weight-bold text-danger">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" onclick="copyCoupon()">
                                    Copy
                                </button>
                            </div>
                        </div>
                        <div class="text-center d-none" id="copy"> Coupon copied successfully!</div>
                        <div class="text-center mt-3">
                            Visit <a id="store-name" target="_blank" rel="nofollow" class="d-inline-flex" href="#"></a> and <span id="store-help-text"></span>
                        </div>
                    </div>
                    <div class="text-center">
                        Share this <span id="coupon-type"></span> with your friends
                        <div class="my-3">
                            <a href="" id="facebook-share" target="_blank"><i class="fab fa-facebook-square fa-3x m-1"></i></a>
                            <a href="" id="twitter-share" target="_blank"><i class="fab fa-twitter-square fa-3x m-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script defer>
        let coupon = @json($selected);
        if (coupon) {
            if(coupon.type == "DEAL") {
                $('#header-text').text('Your Deal Activated');
                $('#coupon').parent().hide();
                $('#store-help-text').text("no code required!");
            } else {
                $('#header-text').text('Here is your Coupon Code');
                $('#coupon').val(coupon.code);
                $('#store-help-text').text("paste your code at checkout!");
            }
            $('#coupon-type').text(coupon.type);
            $('#store-name').html(coupon.store.name);
            $('#store-name').attr('href', coupon.affiliate_url ?? coupon.store.affiliate_url ?? coupon.store.website_url);
            $('#facebook-share').attr('href', "https://www.facebook.com/share.php?u=" + window.location.href.split('?')[0]);
            $('#twitter-share').attr('href', "https://www.twitter.com/share?url=" + window.location.href.split('?')[0]);
            $('#showCoupon').modal('show');
        }
        function showCoupon(id)
        {
            window.open(window.location.pathname+'?coupon=' + id, '_blank');
        }
        function copyCoupon() {
            if (!navigator.clipboard) {
                fallbackCopyTextToClipboard(coupon.code);
                return;
            }
            navigator.clipboard.writeText(coupon.code).then(function() {
                $('#copy').removeClass('d-none');
            });
        }

        function fallbackCopyTextToClipboard(text) {
            var textArea = document.createElement("textarea");
            textArea.value = text;

            // Avoid scrolling to bottom
            textArea.style.top = "0";
            textArea.style.left = "0";
            textArea.style.position = "fixed";

            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            console.log(textArea)

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                console.log('Fallback: Copying text command was ' + msg);
            } catch (err) {
                console.error('Fallback: Oops, unable to copy', err);
            }

            document.body.removeChild(textArea);
        }

    </script>
@endsection
