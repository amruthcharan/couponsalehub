@extends('frontend.layouts.v2')

@section('title', $post->seo_title ?? $post->title)
@section('description', $post->meta_description ?? $post->excerpt)
@section('created', $post->created_at->format('Y-m-d\TH:m:sP'))
@section('updated', $post->updated_at->format('Y-m-d\Th:m:sP'))

@section('body')
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <div class="tab-content">
                                <div class="container">
                                    <h1>{{ $post->title }}</h1>
                                    <div class="post-meta">
                                        by <span class="author-name">{{ $post->authorId->name }}</span>
                                        in <a href="{{ route('page', $post->category->slug) }}" class="category-name">{{ $post->category->name }}</a>
                                        on <span>{{ $post->updated_at->format('d-M-Y') }}</span>
                                    </div>
                                    <div class="post-body">
                                        {!! $post->body !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('frontend.v2.blog.related')
                    @include('frontend.v2.blog.author')
                </div>
                @include('frontend.v2.partials.sidebar')
            </div>
        </div>
    </div>
@endsection
