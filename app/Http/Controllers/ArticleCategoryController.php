<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Session;

/*
 * app/Http/Controller/ArticleCategoryController.php
Создайте контроллер (используя artisan) и экшен index.
Извлеките из базы все категории и передайте их в шаблон.

Бонусное задание: выведите данные с пейджингом, по 10 элементов на страницу

resources/views/article_category/index.blade.php
Подключите макет
Выведите категории любым удобным способом. Для каждой категории нужно вывести ее название и описание.


app/Http/Controller/ArticleCategoryController.php
Создайте экшен show.
Извлеките из базы текущую запрошенную категорию и передайте её в шаблон.
resources/views/article_category/show.blade.php
Подключите макет.
Выведите имя и описание категории.
Выведите список названий статей категории в виде <ol> списка.
 Если статей в категории нет, то тег <ol> не должен отображаться.
Каждое название – ссылка на саму статью (маршрут подсмотрите в файле роутов).

resources/views/article/show.blade.php
Добавьте ссылку на категорию статьи рядом с именем статьи.

Подсказки
Проверка коллекции на пустоту: $category->articles->isEmpty()
Список статей категории можно получить так: $category->articles
 */

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $articleCategories = ArticleCategory::all();
        return view('article_category.index', compact('articleCategories'));
    }

    public function show($id)
    {
        $category = ArticleCategory::findOrFail($id);
        return view('article_category.show', compact('category'));
    }

    /*
      app/Http/Controller/ArticleCategoryController.php
Реализуйте экшены для создания категории. Добавьте следующие валидации:

Имя (name) – обязательно и должно быть максимум 100 знаков.
Описание (description) – обязательно и должно быть минимум 200 знаков.
Состояние (state) – может быть либо draft либо published.
public function create()
    {
        $category = new ArticleCategory();
        return view('article_category.create', compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:article_categories|max:100',
            'description' => 'required|min:200',
            'state' => [
                Rule::in(['draft', 'published']),
            ]
        ]);

        $category = new ArticleCategory();
        $category->fill($request->all());
        $category->save();

        return redirect()
            ->route('article_categories.index');
    }
    resources/views/article_category/create.blade.php
@extends('layouts.app')

@section('content')
    {{-- BEGIN --}}
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ Form::model($category, ['url' => route('article_categories.store')]) }}
        {{ Form::label('name', 'Название') }}
        {{ Form::text('name') }}<br>
        {{ Form::label('description', 'Описание') }}
        {{ Form::textarea('description') }}<br>
        {{ Form::select('state', ['draft' => 'Черновик', 'published' => 'Опубликован']) }}<br>
        {{ Form::submit('Создать') }}
    {{ Form::close() }}
    {{-- END --}}
@endsection


    Реализуйте форму создания категории. Добавьте три поля:
Имя
Описание
Состояние
Добавьте вывод ошибок.

    @extends('layouts.app')

@section('content')
    {{-- BEGIN --}}
    <small><a href="{{ route('article_categories.create') }}">Создать категорию</a></small>
    {{-- END --}}
    <h1>Список категорий статей</h1>
    @foreach($articleCategories as $category)
        <h2><a href="{{ route('article_categories.show', $category) }}">{{$category->name}}</a></h2>
        <div>{{$category->description}}</div>
    @endforeach
@endsection
     */

    // Вывод формы
    public function create()
    {
        // Передаём в шаблон вновь созданный объект. Он нужен для вывода формы через Form::model
        $category = new ArticleCategory();
        return view('article_category.create', compact('category'));
    }

    // Здесь нам понадобится объект запроса для извлечения данных
    public function store(Request $request)
    {
        // Проверка введённых данных
        // Если будут ошибки, то возникнет исключение
        // Иначе возвращаются данные формы
        $data = $this->validate($request, [
            'name' => 'required|max:100',
            'description' => 'required|min:20',
            'state' => 'required| in:draft,published'
        ]);

        $category = new ArticleCategory();
        // Заполнение статьи данными из формы
        $category->fill($data);
        // При ошибках сохранения возникнет исключение
        $category->save();
        // Редирект на указанный маршрут
        return redirect()
            ->route('article_categories.index')
            ->with('success', 'Category created successfully');
    }
}
