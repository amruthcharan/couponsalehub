<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title>@yield('title', 'home')</title>
    <meta name="description" content="@yield('description')">
    <meta property="article:published_time" content="@yield('created')" />
    <meta property="article:modified_time" content="@yield('updated')" />

    <!-- Favicon -->
    <link href="{{ image(setting('site.favicon')) }}" rel="icon">
    @yield('canonical')
    @yield('prev')
    @yield('next')

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/v2.css') }}" rel="stylesheet">
</head>

<body>
@include('frontend.v2.partials.nav')
@yield('body')
@include('frontend.v2.partials.footer')

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<!-- Template Javascript -->
<script src="{{asset('js/v2.js')}}"></script>
@yield('scripts')

@if(setting('site.google_analytics_tracking_id'))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('site.google_analytics_tracking_id') }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '{{ setting('site.google_analytics_tracking_id') }}');
    </script>
@endif
</body>
</html>
