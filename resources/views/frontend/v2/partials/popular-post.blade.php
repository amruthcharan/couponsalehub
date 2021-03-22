<div class="card">
    <a href="{{ route('page', $post['slug']) }}">
        <img class="card-img-top" src="{{ image($post['image']) }}" alt="{{$post['title']}}">
    </a>
    <div class="card-body">
        <div class="text-center">
            <a href="{{ route('page', $post['slug']) }}">{{ $post['title'] }}</a>
        </div>
    </div>
</div>
