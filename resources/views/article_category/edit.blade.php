@include('layouts.flash_msg')

{{ Form::model($category, ['route' => ['article_categories.update', $category], 'method' => 'PATCH']) }}
@include('article_category.form')
{{ Form::submit('Update') }}
{{ Form::close() }}
