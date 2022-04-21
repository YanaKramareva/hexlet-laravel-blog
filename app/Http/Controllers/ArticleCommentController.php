<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

/*
 * В этом уроке вам предстоит добавить вложенный ресурс – комментарий к статье.
 * Его особенность в том, что список комментариев и создание комментария выводятся
 * на странице самой статьи. Все остальное уже во вложенном ресурсе.

В целях простоты в этом проекте не учитываются пользователи.
В реальной жизни комментарии принадлежат пользователям и только они могут управлять ими.
Поэтому придется делать авторизацию.

app/Http/Controller/ArticleCommentController.php
Сгенерируйте ресурсный контроллер.
 Добавьте все нужные экшены (кроме списка и формы создания).
Добавьте минимальную валидацию: длина комментария не может быть меньше 10 символов.

resources/views/article_comment/edit.blade.php
Реализуйте редактирование комментария.


 */
namespace App\Http\Controllers;

class ArticleCommentController extends Controller
{
    public function store(Article $article, Request $request)
    {
        $validated = $this->validate($request, [
            'content' => 'required|min:10'
        ]);

        $comment = $article->comments()->make();
        $comment->fill($validated);
        $comment->save();

        return redirect()
            ->route('articles.show', $article);
    }

    public function edit(Article $article, ArticleComment $comment)
    {
        return view('article_comment.edit', compact('article', 'comment'));
    }

    public function update(Request $request, Article $article, ArticleComment $comment)
    {
        $validated = $this->validate($request, [
            'content' => 'required|min:10'
        ]);

        $comment->fill($validated);
        $comment->save();
        return redirect()
            ->route('articles.show', $article);
    }

    public function destroy(Article $article, ArticleComment $comment)
    {
        $comment->delete();
        return redirect()->route('articles.show', $article);
    }
}
