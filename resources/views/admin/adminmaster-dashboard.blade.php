<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adminstrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hidden-div.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="adminmaster">
    @include('admin.layouts.menuside-bar')
        <div class="content-wrapper">
            <admin-main></admin-main>
        </div>
    </div>
    @include('admin.layouts.footer')

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/vendor') }}/sweetalert2@8.js"></script>
</body>

</html>
