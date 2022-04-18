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

{{ Form::model($article, ['route' => 'articles.store']) }}
{{ Form::label('name', 'Название') }}
{{ Form::text('name') }}<br>
{{ Form::label('body', 'Содержание') }}
{{ Form::textarea('body') }}<br>
{{ Form::label('category_id', 'Категория') }}
{{ Form::text('category_id') }}<br>
{{ Form::label('state', 'Состояние') }}
{{ Form::text('state') }}<br>
{{ Form::submit('Создать') }}
{{ Form::close() }}
