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
{{ Form::label('description', 'Description') }}
{{ Form::textarea('description') }}<br>
{{ Form::label('state', 'State') }}
{{ Form::text('state') }}<br>
