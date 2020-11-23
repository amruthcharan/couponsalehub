@extends('frontend.layouts.v2')

@section('title', setting('site.categories-title'))
@section('description', setting('site.categories-description'))

@section('body')
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <div class="tab-content">
                                <div class="container">
                                    <h1>Categories</h1>
                                    <div class="row post-body">
                                        @foreach($categories as $category)
                                            <div class="col-md-4 my-3">
                                                <div class="product-item">
                                                    <div class="category-icon">
                                                        <a href="{{ route('page' ,$category->slug) }}">
                                                            <i class="{{ $category->icon }} fa-5x"></i>
                                                        </a>
                                                    </div>
                                                    <div class="category-title">
                                                        <a href="{{ route('page', $category->slug) }}">{{ $category->name }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
