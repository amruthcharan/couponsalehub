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
                                        <div class="row">
                                            @foreach($stores as $store)
                                                <div class="col-md-3">
                                                    @include('frontend.v2.partials.popular-store')
                                                </div>
                                            @endforeach
                                            <div class="col-md-12 mt-3">
                                                {!! $stores->links('frontend.v2.partials.pagination') !!}
                                            </div>

                                        </div>
                                        @forelse($posts as $post)
                                            <div class="blog-box row m-3">
                                                <div class="col-md-4">
                                                    <div class="post-media">
                                                        <a href="{{route('page', $post->slug)}}" title="{{$post->title}}">
                                                            <img src="{{ image($post->image) }}" alt="{{$post->title}}" class="img-fluid">
                                                            <div class="hovereffect"></div>
                                                        </a>
                                                    </div><!-- end media -->
                                                </div><!-- end col -->

                                                <div class="blog-meta big-meta col-md-8">
                                                    <h4><a href="{{route('page', $post->slug)}}" title="{{$post->title}}">{{$post->title}}</a></h4>
                                                    <p class="text-justify">{{$post->excerpt}}</p>
                                                    <small class="badge badge-orange"><a class="color-white" href="{{route('page', $post->category->slug)}}" title="">{{$post->category->name}}</a></small>
                                                    <small>{{$post->created_at->diffForHumans()}}</small>
                                                    <small><a href="#" class="disabled color-orange" title="">by {{$post->authorId->name}}</a></small>
                                                </div><!-- end meta -->
                                            </div>
                                        @empty
                                            @if(count($stores) == 0)
                                                <div class="w-100 text-center">
                                                    <p>Nothing to show. Try other categories!</p>
                                                </div>
                                            @endif
                                        @endforelse
                                        <div class="col-md-12 mt-3">
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
