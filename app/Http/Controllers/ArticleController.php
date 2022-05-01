<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate(
            $request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:200'
            ]
        );

        $article = new Article();
        $article->fill($request->all());
        $article->save();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article $article
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function show(Article $article)
    {
        $comments = new ArticleComment();
        $comments = $comments->where('article', $article);// need for the form
        return view('article.show', compact('article', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article $article
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Article      $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Article $article)
    {
        $this->validate(
            $request, [
            'name' => 'required|unique:articles,name,' . $article->id,
            'body' => 'required|min:200',
            ]
        );

        $article->fill($request->all());
        $article->save();
        return redirect()
            ->route('articles.index')
            ->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article)
    {
        $article?->delete();
        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully');
    }
}
