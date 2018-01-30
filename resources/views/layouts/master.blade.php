<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="" type="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@lang('messages.title_html')</title>
    {{ Html::style('css/modern-business.css') }}
    {{ Html::style('css/style.css') }}
    {{ Html::style('css/app.css') }}
    @yield('css')
</head>
<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    {{ Html::script('js/manifest.js') }}
    {{ Html::script('js/vendor.js') }}
    {{ Html::script('js/app.js') }}
    @yield('javascript')
</body>
