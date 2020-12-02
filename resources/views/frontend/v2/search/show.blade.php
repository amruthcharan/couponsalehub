@extends('frontend.layouts.v2')

@section('title', setting('site.search-title'))
@section('description', setting('site.search-description'))

@section('body')
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <div class="tab-content">
                                <div class="container">
                                    <h1>Search</h1>
                                    <div class="row post-body">
                                        <form class="w-100" action="{{ route('search') }}">
                                            <div class="input-group">
                                                <input type="text" name="search" class="form-control" placeholder="Search offers & reviews" value="{{ $search }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary" type="button">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="col-md-12 row">
                                            @foreach($stores as $store)
                                                <div class="col-md-3 ">
                                                    @include('frontend.v2.partials.popular-store')
                                                </div>
                                            @endforeach
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
                                                <p>Nothing found with your search term. Try Again!</p>
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
