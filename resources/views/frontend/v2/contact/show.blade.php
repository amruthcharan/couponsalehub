@extends('frontend.layouts.v2')

@section('title', setting('site.contact-title'))
@section('description', setting('site.contact-description'))

@section('body')
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <div class="tab-content">
                                <div class="container">
                                    <h1>Contact Us</h1>
                                    <div class="row post-body">
                                        @if(Session::has('contact-success'))
                                            <div class="mx-auto mt-2">
                                                <div class="alert alert-success alert-dismissible">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    {{ Session::get('contact-success') }}
                                                </div>
                                            </div>
                                        @endif
                                        <form class="w-100" method="post" action="{{ route('submit-contact') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="name" placeholder="Your Name" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" class="form-control" name="email" placeholder="Your Email" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subject" placeholder="Subject" required />
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="content" placeholder="Message" required></textarea>
                                            </div>
                                            <div><button class="btn" type="submit">Send Message</button></div>
                                        </form>
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
