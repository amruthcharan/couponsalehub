<div class="col-md-12 my-2">
        <div class="card card-body">
            <div class="row text-center text-md-left">
                <div class="col-md-3 text-center">
                    <img class="w-75" src="{{ image($post->authorId->avatar) }}" alt="{{ $post->authorId->name }}">
                </div>
                <div class="col-md-9 my-auto">
                    <h2>{{ $post->authorId->name }}</h2>
                    <p>{{ $post->authorId->bio }}</p>
                </div>
            </div>
        </div>
</div>
