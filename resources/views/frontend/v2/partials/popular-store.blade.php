<div class="card">
    <a href="{{ route('page', $store['slug']) }}">
        <img class="card-img-top" src="{{ image($store['logo']) }}" alt="{{$store['name']}}">
    </a>
    <div class="card-body">
        <h5 class="card-title text-center" style="font-size: 16px;">{{$store['name']}}</h5>
        <div class="text-center">
            <a href="{{ route('page', $store['slug']) }}" class="btn btn-primary btn-sm">Visit Store</a>
        </div>
    </div>
</div>
