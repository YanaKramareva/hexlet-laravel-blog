@extends('layouts.app')
@include('layouts.flash_msg')

@section('content')
    <h1>{{$article->name}}</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- BEGIN (write your solution here) --}}
    {{ Form::model($comment, ['route' => ['articles.comments.update', [$article, $comment]], 'method' => 'PATCH']) }}
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content') }}<br>
    {{ Form::submit('Update') }}
    {{ Form::close() }}

    {{-- END --}}
@endsection
