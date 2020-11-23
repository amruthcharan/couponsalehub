@extends('frontend.layouts.v2')

@section('title', $category->seo_title)
@section('description', $category->meta_description)

@section('body')
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <div class="tab-content">
                                <div class="container">
                                    <h1>{{ $category->name }}</h1>
                                    <div class="row post-body">
                                        @foreach($posts as $post)
                                            <div class="col-md-4 my-3">
                                                <div class="product-item">
                                                    <div class="product-image">
                                                        <a href="{{ route('page' ,$post->slug) }}">
                                                            <img src="{{ image($post->image) }}" alt="{{ $post->title }}">
                                                        </a>
                                                    </div>
                                                    <div class="product-title">
                                                        <a href="{{ route('page', $post->slug) }}">{{ $post->title }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-md-12">
                                            {!! $posts->links('frontend.v2.partials.pagination') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('frontend.v2.partials.sidebar')
            </div>
        </div>
    </div>
@endsection
