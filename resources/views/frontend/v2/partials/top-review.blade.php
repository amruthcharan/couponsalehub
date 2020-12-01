<div class="card">
    <img class="card-img-top" src="{{ image($store['feature_image']) }}" alt="{{$store['name']}}">
    <div class="card-body">
        <h5 class="card-title text-center">{{$store['name']}}</h5>
        <div class="text-center">
            <a href="{{ route('page', $store['slug']) }}" class="btn btn-primary btn-sm">Read Review</a>
        </div>
    </div>
</div>
