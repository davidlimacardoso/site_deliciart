<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DeliciArt @yield('title')</title>

    <!--STYLESHEETS-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dashboard.css')}}">
    @stack('styles')

    <!--SCRIPTS-->
    @stack('script-top')
    
</head>
<body>
    @extends('admin/partials/_partials')
    
    @section('admin-header')
        @parent
    @endsection

    
    @section('admin-nav')
        @parent
    @endsection

    @section('admin-body')
       @parent
    @endsection

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('admin/dashboard.js')}}"></script>
@stack('script-bottom')
</body>
</html>
