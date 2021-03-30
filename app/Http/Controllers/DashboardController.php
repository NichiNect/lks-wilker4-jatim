<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::count();
        $users = User::count();

        return view('admin.dashboard', compact('articles', 'users'));
    }
}
