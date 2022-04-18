@extends('layouts.app')

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{ Form::model($category, ['route' => 'article_categories.store']) }}
{{ Form::label('name', 'Название') }}
{{ Form::text('name') }}<br>
{{ Form::label('description', 'Description (200)') }}
{{ Form::textarea('description') }}<br>
{{ Form::label('state', 'State') }}
{{ Form::text('state') }}<br>
{{ Form::submit('Создать') }}
{{ Form::close() }}
