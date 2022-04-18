<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

/*
 * Реализуйте рейтинг статей. Он должен быть доступен по ссылке /rating.
 * На этой странице нужно вывести опубликованные статьи отсортированные по количеству лайков.

routes/web.php
Реализуйте маршрут /rating и свяжите его с index экшеном контроллера RatingController.

app/Http/Controller/RatingController.php
Создайте контроллер и экшен index. Извлеките из базы все статьи и выполните нужные преобразования
 (взять только опубликованные, отсортировать их) над коллекцией перед ее передачей в шаблон.

Метод isPublished() у статьи позволяет узнать опубликована она или нет
Количество лайков можно узнать обратившись к свойству likes_count
resources/views/rating/index.blade.php
Выведите статьи в табличном виде. Для каждой статьи нужно вывести количество лайков и название.

Подсказки
Коллекции возвращаемые Laravel из базы данных поддерживают интерфейс Collection

class RatingController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        // in real life sorting should be done by sql
        $articlesForRating = $articles->filter(function ($a) {
            return $a->isPublished();
        })->sortByDesc('likes_count');
        return view('rating.index', ['articles' => $articlesForRating]);
    }
}
 */

class RatingController extends Controller
{
    public static function index()
    {
        $articles = Article::where('state', 'published')->get();
        $sorted = $articles->sortBy('likes_count');
        return view('rating/index', ['articles' => $sorted]);
    }
}
