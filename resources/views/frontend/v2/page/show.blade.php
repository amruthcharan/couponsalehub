@extends('frontend.layouts.v2')

@section('title', $page->meta_title)
@section('description', $page->meta_description)
@section('created', $page->created_at->format('Y-m-d\Th:m:sP'))
@section('updated', $page->updated_at->format('Y-m-d\Th:m:sP'))

@section('body')
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <div class="tab-content">
                                <div class="container">
                                    <h1>{{ $page->title }}</h1>

                                    <div class="post-body">
                                        {!! $page->body !!}
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
