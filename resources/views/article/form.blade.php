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

{{ Form::label('name', 'Name') }}
{{ Form::text('name') }}<br>
{{ Form::label('body', 'Content') }}
{{ Form::textarea('body') }}<br>
{{ Form::label('category_id', 'Category') }}
{{ Form::text('category_id') }}<br>
{{ Form::label('state', 'State') }}
{{ Form::text('state') }}<br>
