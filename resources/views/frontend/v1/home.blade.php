@extends('frontend.layouts.v1')

@section('title', 'Home')
@section('description', 'description')

@section('top')
    @include('frontend.v1.partials.top')
@endsection
@section('body')
    <section class="section">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-top clearfix">
                            <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                        </div><!-- end blog-top -->

                        <div class="blog-list clearfix">
                            @foreach($posts as $post)
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="{{route('post', $post->slug)}}" title="{{$post->title}}">
                                                <img src="{{ image($post->image) }}" alt="{{$post->title}}" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="{{route('post', $post->slug)}}" title="{{$post->title}}">{{$post->title}}</a></h4>
                                        <p>{{$post->excerpt}}</p>
                                        <small class="firstsmall"><a class="bg-orange" href="{{route('category', $post->category->slug)}}" title="">{{$post->category->name}}</a></small>
                                        <small><a href="#" title="">{{$post->created_at->diffForHumans()}}</a></small>
                                        <small><a href="#" title="">by {{$post->authorId->name}}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
                            @endforeach
                        </div><!-- end blog-list -->
                    </div><!-- end page-wrapper -->

                    <hr class="invis">

                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-start">
                                    {{$posts->links()}}
                                </ul>
                            </nav>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->
                @include('frontend.v1.partials.sidebar')
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
