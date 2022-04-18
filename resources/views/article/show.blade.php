@extends('layouts.app')

@section('content')
    <h1>{{$article->name}}</h1>
    {{-- BEGIN (write your solution here) --}}
    <h2>{{$article->category}}</h2>
    {{-- END --}}
    <div>{{$article->body}}</div>
@endsection
