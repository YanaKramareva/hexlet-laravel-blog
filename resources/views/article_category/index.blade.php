@extends('layouts.app')
@include('layouts.flash_msg')

@extends('layouts.app')

@section('content')
    <small><a href="{{ route('article_categories.create') }}">Создать категорию</a></small>
    <h1>Article categories</h1>
    @foreach($articleCategories as $category)
        <h2>
            <a href="{{ route('article_categories.show', $category) }}">{{$category->name}}</a>
            <form action="{{ route('article_categories.edit', $category) }}">
                <input type="hidden" name="_method" value="GET">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <button type="submit">Edit</button>
            </form>
            {{-- BEGIN (write your solution here) --}}
            {{-- END --}}
            <form action="{{ route('article_categories.destroy', $category) }}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <button type="submit">Delete</button>
            </form>
        </h2>
        <div>{{$category->description}}</div>
    @endforeach
@endsection

@section('content')
    <small><a href="{{ route('article_categories.create') }}">Make category</a></small>
    <h1>Article categories</h1>
    @foreach($articleCategories as $category)
        <h2>
            <a href="{{ route('article_categories.show', $category) }}">{{$category->name}}</a>
            (<a href="{{ route('article_categories.edit', $category) }}">Edit</a>)
        </h2>
        <div>{{$category->description}}</div>
    @endforeach
@endsection

