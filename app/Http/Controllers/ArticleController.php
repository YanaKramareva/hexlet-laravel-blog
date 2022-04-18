<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /*
     * В этом упражнении нужно реализовать поисковую форму,
     * которая позволяет отфильтровать статьи по слову,
     * встречающемуся в названии статьи. Форма состоит из двух элементов:
     * текстового поля (имя поля q, это важно для тестов) и кнопки "найти".
     * Она ведет на тот же маршрут, который выводит список всех статей.

app/Http/Controller/ArticleController.php
Реализуйте экшен index.
    Если клиент прислал запрос из формы,
     выполните необходимую фильтрацию данных через правильный запрос в базу данных.

resources/views/article/index.blade.php
Выведите форму. Убедитесь что она работает.
Реализуйте подстановку данных в форму после запроса.

   Подсказки
Поисковые формы отправляются методом GET.
Для простой фильтрации (когда данных немного), подойдет Like-запрос.
 Выполняется он так: Article::where('name', 'ilike', "%{$q}%"). Где $q – это запрос из формы.
     */


    public function index(Request $request)
    {
        /*$query = $request->input('q');
        // Like has huge impact on the performance. Use them carefully. Learn indexes and full text search.
        $articles = $query ? Article::where('name', 'like', "%{$query}%")->paginate() : Article::paginate();
        return view('article.index', compact('articles', 'query'));
*/
        $userQuery = $request->input('q'); // Получает значение по указанному ключу
        if ($userQuery) {
            $articles = Article::where('name', 'like', "%{$userQuery}%")->paginate();
        } else {
            $perPage = 10;
            $articles = Article::paginate($perPage);
        }
        return view('article.index', ['articles' => $articles, 'query' => $userQuery]);

        /*$query = Article::query();
        // Получаю икземпляр QueryBuilder для того, чтобы можно было в дальнейшем
        // в зависимости от условий использовать конструкцию ->
        $userQuery = $request->input('q'); // Получаю строку с запросом от пользователя

        if ($userQuery) {
            // Если пользовательский запрос не пустой, то формируем WHERE ILIKE запрос к БД
            $query->where('name', 'like', "%{$userQuery}%");
        }

        $articles = $query->paginate();
        // Получаем коллекцию статей с пагинацией
        // (т.е. выполнили запрос в БД, получили ответ,
        // обернулось все это дело в коллекцию + учли все что связано с погинацией)
        return view('article.index', [
            // передаем данные в шаблон, проводим работу с представлением.
            'articles' => $articles,
            'query' => $userQuery,
        ]);*/
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    // Вывод формы
    public function create()
    {
        // Передаём в шаблон вновь созданный объект. Он нужен для вывода формы через Form::model
        $article = new Article();
        return view('article.create', compact('article'));
    }

    // Здесь нам понадобится объект запроса для извлечения данных
    public function store(Request $request)
    {
        // Проверка введённых данных
        // Если будут ошибки, то возникнет исключение
        // Иначе возвращаются данные формы
        $data = $this->validate($request, [
           'name' => 'required|unique:articles',
            'body' => 'required|min:10',
            'state' => 'required|min:1',
            'category_id' => 'required'
        ]);

        $article = new Article();
        // Заполнение статьи данными из формы
        $article->fill($data);
        // При ошибках сохранения возникнет исключение
        $article->save();

        $request->session()->flash('status', 'Объект создан');
        // Редирект на указанный маршрут
        return redirect()
            ->route('articles.index')->with('success', 'Article created successfully');
    }
}
