<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title>DimoFarm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700"
        rel="stylesheet">
    <link href="{{ asset("assets/public/assets/css") }}/bootstrap.css" rel="stylesheet" />
    <link href="{{ asset("assets/public/assets/css") }}/bootstrap-responsive.css" rel="stylesheet" />
    <link href="{{ asset("assets/public/assets/css") }}/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="{{ asset("assets/public/assets/css") }}/jcarousel.css" rel="stylesheet" />
    <link href="{{ asset("assets/public/assets/css") }}/flexslider.css" rel="stylesheet" />
    <link href="{{ asset("assets/public/assets/css") }}/style.css" rel="stylesheet" />
    <link href="{{ asset("assets/public/assets/css") }}/style.css" rel="stylesheet" />
    <link href="{{ asset("assets/public/assets/css") }}/slitslider.css" rel="stylesheet" />
    <link href="{{ asset('css/fontawesome/css/all.css') }}" rel="stylesheet">


    <link href="{{ asset("assets/public/assets/skins") }}/default.css" rel="stylesheet" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset("assets/public/assets/ico") }}/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset("assets/public/assets/ico") }}/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset("assets/public/assets/ico") }}/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed"
        href="{{ asset("assets/public/assets/ico") }}/apple-touch-icon-57-precomposed.png" />
    <link rel="shortcut icon" href="{{ asset("assets/public/assets/ico") }}/favicon.png" />
    <link href="{{ asset('css/custom-logo.css') }}" rel="stylesheet">


</head>
<body>
    <div id="adminmaster">
        <div id="wrapper">
            @include('public.layouts.header')
            <home-main></home-main>
            @include('public.layouts.footer')
        </div>
    </div>
</body>
<a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.3"></script>
<script src="{{ asset('css/fontawesome/js/all.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset("assets/public/assets/js") }}/jquery.js"></script>
<script src="{{ asset("assets/public/assets/js") }}/jquery.easing.1.3.js"></script>
<script src="{{ asset("assets/public/assets/js") }}/bootstrap.js"></script>
<script src="{{ asset("assets/public/assets/js/jcarousel") }}/jquery.jcarousel.min.js"></script>
<script src="{{ asset("assets/public/assets/js") }}/jquery.fancybox.pack.js"></script>
<script src="{{ asset("assets/public/assets/js") }}/jquery.fancybox-media.js"></script>
<script src="{{ asset("assets/public/assets/js/google-code-prettify") }}/prettify.js"></script>
<script src="{{ asset("assets/public/assets/js/portfolio") }}/jquery.quicksand.js"></script>
<script src="{{ asset("assets/public/assets/js/portfolio") }}/setting.js"></script>
<script src="{{ asset("assets/public/assets/js") }}/jquery.flexslider.js"></script>
<script src="{{ asset("assets/public/assets/js") }}/jquery.nivo.slider.js"></script>
<script src="{{ asset("assets/public/assets/js") }}/modernizr.custom.js"></script>
<script src="{{ asset("assets/public/assets/js") }}/jquery.ba-cond.min.js"></script>
<script src="{{ asset("assets/public/assets/js") }}/jquery.slitslider.js"></script>
<script src="{{ asset("assets/public/assets/js") }}/animate.js"></script>
<script src="{{ asset("assets/public/assets/js") }}/custom.js"></script>

</html>
