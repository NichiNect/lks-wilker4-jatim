<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::latest()->limit(6)->get();
        return view('home', compact('articles'));
    }

    public function showArticle(Article $article)
    {
        $comments = Comment::where('article_id', $article->id)->latest()->limit(10)->get();
        // dd($article);
        $articles = Article::latest()->limit(6)->get();
        return view('frontend.show-article', compact('article', 'articles', 'comments'));
    }
}
