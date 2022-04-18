<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<div class="container mt-4">
    <!-- BEGIN (write your solution here) -->
    <a href="{{ url('/about') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">About</a>
    <a href="{{ route('articles.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Статьи</a>
    <a href="{{ url('/team') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Team</a>
    <a href="{{ route('rating.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Articles Rating</a>
    <a href="{{ url('/article_categories') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Articles Categories</a>
    <!-- END -->
</div>
</body>
</html>
