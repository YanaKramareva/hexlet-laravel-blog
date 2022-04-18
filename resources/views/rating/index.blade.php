@extends('layouts.app')

<!-- Секция, содержимое которой обычный текст. -->
@section('title', 'Laravel | Articles rating')

<!-- Секция, содержащая HTML блок. Имеет открывающую и закрывающую часть. -->
@section('content')
    <h1>Статьи</h1>
    <table>
        @foreach ($articles as $article)
            <tr>
                <td>
                    {{ $article['name'] }} {{ $article['likes_count'] }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
