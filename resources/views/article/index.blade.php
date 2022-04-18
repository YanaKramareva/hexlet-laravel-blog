@extends('layouts.app')

@if (Session::has('flash_message'))
    {{ Session::get('status') }}
@endif

{{Form::open(['route' => 'articles.index', 'method' => 'GET'])}}
{{Form::text('q', $query)}}
{{Form::submit('Click Me!')}}
{{Form::close()}}

@section('content')
    <h1>Список статей</h1>
    @foreach($articles as $article)
        <h2>{{$article->name}}</h2>
        <h2>{{$article->category->name}}</h2>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
@endsection
