<!doctype html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="csrf-param" content="_token" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hexlet Blog - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <div class="container mt-4">
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="{{route('articles.index')}}">Articles</a>
            <a href="{{route('article_categories.index')}}">Articles categories</a>
            <a href="/team">Team</a>

            <h1>@yield('header')</h1>
            <div>
                @yield('content')
            </div>
        </div>
    </body>
</html>
