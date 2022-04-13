@extends('layouts.app')

<!-- Секция, содержимое которой обычный текст. -->
@section('title', 'О блоге')

<!-- Секция, содержащая HTML блок. Имеет открывающую и закрывающую часть. -->
@section('content')
    <h1>О блоге</h1>
    <p>Эксперименты с Ларавелем на Хекслете</p>
    @foreach ($team as $member)
        <h2>{{ $member['name'] }}</h2>
        <p>{{ $member['position'] }}</p>
    @endforeach
@endsection
