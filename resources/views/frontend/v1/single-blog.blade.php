@extends('frontend.layouts.v1')

@section('title', $post->seo_title ?? $post->title)
@section('description', $post->meta_description ?? $post->excerpt)

@section('top')
    @include('frontend.v1.partials.top')
@endsection
@section('body')
    <section class="section">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-title-area text-center">
                            <ol class="breadcrumb hidden-xs-down">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                <li class="breadcrumb-item active">{{$post->title}}</li>
                            </ol>

                            <span class="color-orange"><a href="{{route('category', $post->category->slug)}}" title="">{{$post->category->name}}</a></span>

                            <h1>{{$post->title}}</h1>

                            <div class="blog-meta big-meta">
                                <small><a href="#" title="">{{ $post->created_at->diffForHumans() }}</a></small>
                                <small><a href="#" title="">by {{$post->authorId->name}}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end title -->

                        <div class="single-post-media">
                            <img src="{{ image($post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                        </div><!-- end media -->

                        <div class="blog-content">
                            <div class="pp">
                                {!! $post->body !!}
                            </div><!-- end pp -->
                        </div><!-- end content -->

                        <div class="custombox authorbox clearfix">
                            <h4 class="small-title">About author</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <img src="{{image($post->authorId->avatar)}}" alt="" class="img-fluid rounded-circle">
                                </div><!-- end col -->

                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <h4><a href="#">{{$post->authorId->name}}</a></h4>
                                    {!! setting('site.author_desc') !!}
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">You may also like</h4>
                            <div class="row">
                                @foreach($related as $post)
                                <div class="col-lg-6">
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="{{route('post', $post->slug)}}" title="{{$post->title}}">
                                                <img src="{{image($post->image)}}" alt="{{$post->title}}" class="img-fluid">
                                                <div class="hovereffect">
                                                    <span class=""></span>
                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta">
                                            <h4><a href="{{route('post', $post->slug)}}" title="">{{$post->title}}</a></h4>
                                            <small><a href="blog-category-01.html" title="">{{$post->category->name}}</a></small>
                                            <small><a href="{{route('post', $post->slug)}}" title="">{{$post->created_at->diffForHumans()}}</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                </div><!-- end col -->
                                @endforeach
                            </div><!-- end row -->
                        </div><!-- end custom-box -->

                        <hr class="invis1">

                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
                @include('frontend.v1.partials.sidebar')
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
