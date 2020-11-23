<div class="review mt-2">
        <div class="align-items-center">
            <div class="review-slider-item">
                <div class="review-img">
                    <img src="{{ image($post->authorId->avatar) }}" width="50px" alt="Image">
                </div>
                <div class="review-text">
                    <h2>{{ $post->authorId->name }}</h2>
                    <p>{{ $post->authorId->bio }}</p>
                </div>
            </div>
        </div>
</div>
