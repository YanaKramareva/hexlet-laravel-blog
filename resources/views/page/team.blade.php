@extends('layouts.app')

<!-- Секция, содержимое которой обычный текст. -->
@section('title', ' Team')

<!-- Секция, содержащая HTML блок. Имеет открывающую и закрывающую часть. -->
@section('content')
    <h1>Our team</h1>
    @foreach ($team as $member)
        <h2>{{ $member['name'] }}</h2>
        <p>{{ $member['position'] }}</p>
    @endforeach
@endsection
