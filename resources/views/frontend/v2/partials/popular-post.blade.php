<div class="card">
    <a href="{{ route('page', $post['slug']) }}">
        <img class="card-img-top" src="{{ image($post['image']) }}" alt="{{$post['title']}}">
    </a>
    <div class="card-body">
        <div class="text-center">
            <p>
                {{ substr($post['excerpt'], 0, 70) }}...
                <a href="{{ route('page', $post['slug']) }}">read more</a>
            </p>
        </div>
    </div>
</div>
