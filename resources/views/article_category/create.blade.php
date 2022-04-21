@include('layouts.flash_msg')

{{ Form::model($category, ['route' => ['article_categories.store']]) }}
@include('article_category.form')
{{ Form::submit('Create') }}
{{ Form::close() }}


