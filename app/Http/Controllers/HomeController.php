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
        $articles = Article::where('status', 2)->latest()->limit(6)->get();
        return view('home', compact('articles'));
    }

    public function showArticle(Article $article)
    {
        $comments = Comment::with('user')->where('article_id', $article->id)->latest()->limit(10)->get();
        // dd($article);
        $articles = Article::where('status', 2)->latest()->limit(6)->get();
        return view('frontend.show-article', compact('article', 'articles', 'comments'));
    }

    public function allArticle()
    {
        if (isset($_GET['search'])) {
            $key = $_GET['search'];
            $articles = Article::where('title', 'LIKE', "%$key%")->where('status', 2)->latest()->paginate(10);
        } else {
            $articles = Article::where('status', 2)->latest()->paginate(10);
        }
        return view('frontend.all-article', compact('articles'));
    }
}
