<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'photo' => 'required|image|max:5000',
        ]);
        $image = $request->photo;
        $image->storeAs('public/article-images', $image->hashName());
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'photo' => $image->hashName(),
            'created_by' => auth()->id
        ]);
        return redirect()->route('article.index')->withSuccess('Berhasil Menambahkan Artikel');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validation = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'photo' => 'image'
        ]);
        Article::where('id', $article->id)->update($validation);
        return redirect()->route('article.index')->withSuccess('Artikel Berhasil Dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->withSuccess('Artikel Berhasil Dihapus');
    }

    public function userIndex()
    {
        $articles = Article::with('user')->latest()->get();
        // foreach ($articles as $article) {
        //     dd($article->user->name);
        // }
        return view('article.userIndex', compact('articles'));
    }

    public function userShow(Article $article)
    {
        return view('article.userShow', compact('article'));
    }
}
