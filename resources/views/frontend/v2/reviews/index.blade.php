@extends('frontend.layouts.v2')

@section('title', setting('reviews.title') ?? "Offers and Reviews")
@section('description', setting('reviews.description'))

@section('body')
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                @include('frontend.v2.home.top-reviews')
                <div class="col-md-12 mt-3">
                    {!! $top->links('frontend.v2.partials.pagination') !!}
                </div>

            </div>
            <div class="row">
                @include('frontend.v2.home.popular-stores')
                <div class="col-md-12 mt-3">
                    {!! $popular->links('frontend.v2.partials.pagination') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
