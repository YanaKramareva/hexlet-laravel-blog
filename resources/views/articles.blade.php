@extends('layouts.app')

<!-- Секция, содержимое которой обычный текст. -->
@section('title', 'Laravel | Articles')

<!-- Секция, содержащая HTML блок. Имеет открывающую и закрывающую часть. -->
@section('content')
    <h1>Статьи</h1>
    @foreach ($articles as $article)
        <h2>{{ $article['name'] }}</h2>
        <p>{{ $article['body'] }}</p>
    @endforeach
    @endsection
