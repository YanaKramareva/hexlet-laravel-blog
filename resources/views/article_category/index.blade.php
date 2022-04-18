@extends('layouts.app')
@include('layouts.flash_msg')

@section('content')
    <a href="{{ route('article_categories.create') }}">New category</a>
    <h1>Список категорий статей</h1>
    @foreach($articleCategories as $category)
        <h2><a href="{{ route('article_categories.show', $category) }}">{{$category->name}}</a></h2>
        <div>{{$category->description}}</div>
    @endforeach
@endsection
