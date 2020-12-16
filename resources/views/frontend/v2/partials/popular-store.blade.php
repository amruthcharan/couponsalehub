<div class="card my-2">
    <a href="{{ route('page', $store['slug']) }}">
        <img class="card-img-top" src="{{ image($store['logo']) }}" alt="{{$store['name']}}">
    </a>
    <div class="card-body">
        <div class="text-center">
            <a href="{{ route('page', $store['slug']) }}" class="btn btn-primary btn-sm">Visit Store</a>
        </div>
    </div>
</div>
