@extends('layouts.app')
@include('layouts.flash_msg')

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{ Form::model($article, ['route' => 'articles.store']) }}
@include('article.form')
{{ Form::submit('Save') }}
{{ Form::close() }}
