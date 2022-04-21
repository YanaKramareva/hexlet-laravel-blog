@include('layouts.flash_msg')

{{ Form::model($article, ['route' => ['articles.update', $article], 'method' => 'PATCH']) }}
@include('article.form')
{{ Form::submit('Update') }}
{{ Form::close() }}
