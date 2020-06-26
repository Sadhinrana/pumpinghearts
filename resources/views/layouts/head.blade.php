<!DOCTYPE html>

<head>


@yield('head')

<!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/main-color.css')}}" id="colors">

    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('images/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('images/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('images/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('images/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon-16x16.png')}}">
    <link rel="manifest" href="/manifest.json">

    <!-- Scripts -->
    <script src="{{ asset('js/vue.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('scripts/form/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyDgPaverJSklnEidr6QUH36X2jF0PhuLhM&sensor=false&libraries=places'></script>
    <script src="{{ asset('js/location.js') }}" defer></script>
    <script type="text/javascript" src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_CLIENT_ID')}}"></script>

    <script>
        @if(auth())
            window.auth = <?php echo json_encode(auth()->user()); ?>;
        @else
            window.auth = false;
        @endif
        <!-- App base_url-->
        var base_url = {!! json_encode(url('/')) !!}
    </script>

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('images/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
