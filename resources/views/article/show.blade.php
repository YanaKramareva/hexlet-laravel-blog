@extends('layouts.app')
@include('layouts.flash_msg')

@section('content')
    <h1>{{$article->name}}</h1>
    <div>{{$article->body}}</div>

    <h1>Комментарии</h1>

    @foreach($article->comments as $comment)
        <div>{{$comment->content}}</div>
        <div>
            <a href="{{ route('articles.comments.edit', [$article, $comment]) }}">Edit</a>
            <a href="{{ route('articles.comments.destroy', [$article, $comment]) }}" data-confirm="Are you sure?" data-method="delete">Delete</a>
        </div>
        <hr>
    @endforeach

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ Form::model($comment, ['url' => route('articles.comments.store', $article)]) }}
    {{ Form::textarea('content') }}
    {{ Form::submit('Create') }}
    {{ Form::close() }}
@endsection
