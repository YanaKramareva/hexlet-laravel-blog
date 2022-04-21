@extends('layouts.app')
@include('layouts.flash_msg')

@section('content')
    <small><a href="{{ route('articles.create') }}">Make article</a></small>

    <h1>Articles</h1>
        @foreach($articles as $article)
            <h2>
                <a href="{{ route('articles.show', $article) }}">{{$article->name}}</a>
                <form action="{{ route('articles.edit', $article) }}">
                    <input type="hidden" name="_method" value="GET">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <button type="submit">Edit</button>
                </form>
                {{-- BEGIN (write your solution here) --}}
                {{-- END --}}
                <form action="{{ route('articles.destroy', $article) }}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <button type="submit">Delete</button>
                </form>
            </h2>
            <div>{{Str::limit($article->body, 200)}}</div>
        @endforeach


@endsection
