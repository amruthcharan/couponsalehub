@extends('frontend.layouts.v2')

@section('title', setting('site.reviews-title') ?? "Offers and Reviews")
@section('description', setting('site.reviews-description'))
@section('canonical')
    <link rel="canonical" href="/offers-and-reviews" />
@endsection

@section('body')
    <div class="header">
        <div class="container-fluid">
            <div class="u-bg-white">
                <div class="p-3">
                    <h1 class="mb-3 text-center">Offers and Reviews</h1>
                    <div class="row">
                        @foreach($stores as $store)
                            <div class="col-md-3">
                                @include('frontend.v2.partials.top-review')
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 py-2">
                    {!! $stores->links('frontend.v2.partials.pagination') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
