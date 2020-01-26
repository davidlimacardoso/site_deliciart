<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DeliciArt - @yield('title-page')</title>

    <!--STYLESHEETS-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/pagina-inicial.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/all.css')}}">
    @stack('styles')

    <!--SCRIPTS-->
    @stack('script-top')
    
</head>

<body>

    @extends('layouts/_partials')

    @section('navbar')
        @parent
    @endsection

    @section('body-content')
        @parent
    @endsection

    @section('footer')
        @parent
    @endsection

<!--JQUERY BOOTSTRAP POPPERS-->
<script src="{{asset('js/app.js')}}"></script>
@stack('script-bottom')
</body>
</html>
