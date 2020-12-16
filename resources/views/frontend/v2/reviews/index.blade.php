@extends('frontend.layouts.v2')

@section('title', setting('site.reviews-title') ?? "Offers and Reviews")
@section('description', setting('site.reviews-description'))

@section('body')
    <div class="header">
        <div class="container-fluid">
            <div class="u-bg-white">
                @include('frontend.v2.home.top-reviews')
                <div class="col-md-12 py-2">
                    {!! $top->links('frontend.v2.partials.pagination') !!}
                </div>

            </div>
            <div class="u-bg-white">
                @include('frontend.v2.home.popular-stores')
                <div class="col-md-12 py-2">
                    {!! $popular->links('frontend.v2.partials.pagination') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
