@extends('layouts.app')

@section('content')
    <h1>{{$category->name}}</h1>
    <div>{{$category->description}}</div>

    @if ($category->articles->isNotEmpty())
        <h2>Статьи</h2>
        <ol>
            @foreach($category->articles as $article)
                <li>
                    <a href="{{ route('articles.show', $article) }}">{{$article->name}}</a>
                </li>
            @endforeach
        </ol>
    @endif
@endsection
{{-- END --}}
