<?php

namespace App\Http\Controllers\admin;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class articleConfiguration extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $articles = Article::all();
        return view('admin.article.article', compact('articles'));
    }
}
