<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>{{ config('app.name') }} - @yield('title', 'home')</title>
<meta name="keywords" content="@yield('keywords')">
<meta name="description" content="@yield('description')">
<meta name="author" content="@yield('author', 'Amruth Charan')">

<!-- Site Icons -->
<link rel="shortcut icon" href="{{ asset('storage/'.setting('site.favicon')) }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{ asset('storage/'.setting('site.favicon')) }}">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- core CSS -->
<link href="{{ asset('css/v1.css') }}" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

<div id="wrapper">
    @include('frontend.v1.partials.header')
    @yield(('top'))
    @yield('body')
    @include('frontend.v1.partials.footer')
</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="{{ asset('js/v1.js') }}"></script>

</body>
</html>
