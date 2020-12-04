@if($coupon->special_message)
<div class="pl-2 py-1 color-white" style="background: #FF6F61; border: 1px solid #FF6F61">
    {{ $coupon->special_message }}
</div>
@endif
<div class="coupon-box">
    <div class="row">
        @php
            $url = $coupon->affiliate_url ?? $store->affiliate_url ?? $store->website_url;
        @endphp
        <div class="col-md-2 col-sm-4 col-xs-4 h-100 {{$coupon->is_editor_pick ? '' : 'my-auto'}}">
            @if($coupon->is_editor_pick)
            <div class="editor-pick">
                <i class="fa fa-thumbs-up"></i>
            </div>
            @endif
            <div class="col-md-12 text-center">
                <span class="coupon-text d-none d-sm-block">{{ $coupon->coupon_text }}</span>
            </div>
        </div>
        <div class="col-md-7 col-xs-12 col-sm-12 my-auto border-right border-left">
            <h3 class="text-center text-sm-left mt-1">
                <a href="{{ $url }}" rel="nofollow" class="coupon-title text-xs-center">
                    {{ $coupon->title }}
                </a>
            </h3>
            <div class="coupon_desc text-center text-sm-left">
                <p>{{ $coupon->description }}</p>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 col-lg-3 text-center pull-right my-auto">
            @if($coupon->id == app('request')->input('coupon'))
                @if($coupon->type == \App\Coupon::TYPES[0])
                    <a rel="nofollow" href="{{ $url }}" class="btn btn-primary active" target="_blank">DEAL ACTIVATED</a>
                @else
                    <a rel="nofollow" href="{{ $url }}" target="_blank">{{ $coupon->code }}</a>
                @endif
            @else
                <a rel="nofollow" class="btn btn-primary" href="{{ $url }}" onclick="showCoupon({{ $coupon->id }})">
                    {{ $coupon->type == \App\Coupon::TYPES[0] ? "GET DEAL" : "SHOW CODE" }}
                </a>
            @endif
        </div>
        <div class="clearfix"></div>
    </div>
    @if($coupon->proof_image)
        <img src="{{ image($coupon->proof_image) }}" width="100%" alt="">
    @endif
</div>
