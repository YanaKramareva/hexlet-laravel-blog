<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
 * Реализуйте обработчик маршрута articles, который извлекает из базы данных все статьи и выводит их в шаблон.

Получите из базы все статьи и передайте их в шаблон
Выведите их в шаблоне
 */
Route::get('articles', [ArticleController::class, 'index'])
    ->name('articles.index');


Route::get('about', [PageController::class, 'about']);
Route::get('team', [PageController::class, 'team']);

Route::get('rating', [RatingController::class, 'index'])
    ->name('rating.index');

/*Route::get('articles/create', [ArticleController::class, 'create'])
    ->name('articles.create');

Route::post('articles', [ArticleController::class, 'store'])
    ->name('articles.store');

Route::get('articles/{id}', [ArticleController::class, 'show'])
    ->name('article.show');

Route::patch('articles/{id}', [ArticleController::class, 'update'])
    ->name('articles.update');

Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])
    ->name('articles.edit');

Route::delete('articles/{id}', [ArticleController::class, 'destroy'])
    ->name('articles.destroy');
*/

Route::resource(
    'articles',
    ArticleController::class
);

Route::resource(
    'articles.comments',
    ArticleCommentController::class
)
    ->except('index', 'create');

/*
 * Реализуйте маршрут article_categories и свяжите его с index экшеном
 *  контроллера ArticleCategoryController.
 *  Сделайте маршрут именованным.
 */

Route::get('article_categories', [ArticleCategoryController::class, 'index'])
    ->name('article_categories.index');

/*
 * routes/web.php
Добавьте маршруты для создания категории.

exercise/resources/views/article_category/index.blade.php
Добавьте ссылку на создание категории.

 */
Route::get('article_categories/create', [ArticleCategoryController::class, 'create'])
    ->name('article_categories.create');

Route::post('article_categories', [ArticleCategoryController::class, 'store'])
    ->name('article_categories.store');
/*
 * В этом упражнении нужное реализовать страницу категории, на которой выводится список статей этой категории.

routes/web.php
Реализуйте маршрут article_categories/{id}
 и свяжите его с show экшеном контроллера ArticleCategoryController.
Сделайте маршрут именованным.

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
Route::get('article_categories/{id}', [ArticleCategoryController::class, 'show'])
    ->name('article_categories.show');

/*
 * Добавьте маршруты для редактирования категории
 */

Route::patch('article_categories/{id}', [ArticleCategoryController::class, 'update'])
    ->name('article_categories.update');

Route::get('article_categories/{id}/edit', [ArticleCategoryController::class, 'edit'])
    ->name('article_categories.edit');

/*
 * Добавьте маршрут для удаления категории.

app/Http/Controller/ArticleCategoryController.php
Реализуйте экшен для удаления категории.
public function destroy($id)
    {
        $category = ArticleCategory::find($id);
        if ($category) {
            $category->delete();
        }
        return redirect()->route('article_categories.index');
    }
resources/views/article_category/index.blade.php
Выведите ссылку на удаление статьи.
Добавьте подтверждение удаления и отправку данных методом DELETE.

@extends('layouts.app')

@section('content')
    <small><a href="{{ route('article_categories.create') }}">Создать категорию</a></small>
    <h1>Список категорий статей</h1>
    @foreach($articleCategories as $category)
        <h2>
            <a href="{{ route('article_categories.show', $category) }}">{{$category->name}}</a>
            (
                <a href="{{ route('article_categories.edit', $category) }}">Edit</a>
                {{-- BEGIN --}}
                <a href="{{ route('article_categories.destroy', $category) }}"
                    data-method="delete"
                    rel="nofollow"
                    data-confirm="Are you sure?">Delete</a>
                {{-- END --}}

            )
        </h2>
        <div>{{$category->description}}</div>
    @endforeach
@endsection

 */
Route::delete('article_categories/{id}', [ArticleCategoryController::class, 'destroy'])
    ->name('article_categories.destroy');
