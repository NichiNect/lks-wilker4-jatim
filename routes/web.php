<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes([
    // 'register' => false,
    'forgot_password' => false,
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/show-article/{article:slug}', [App\Http\Controllers\HomeController::class, 'showArticle'])->name('frontend.showarticle');

Route::post('/tambahkan-komentar/{article:id}', [CommentController::class, 'store'])->name('comment.store');

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/article', [ArticleController::class, 'index'])->name('admin.article.index');
    Route::get('/create-new-article', [ArticleController::class, 'create'])->name('admin.article.create');
    Route::post('/create-new-article', [ArticleController::class, 'store'])->name('admin.article.store');
    Route::get('/show-detail-article/{id}', [ArticleController::class, 'show'])->name('admin.article.show');
    Route::get('/edit-article/{id}', [ArticleController::class, 'edit'])->name('admin.article.edit');
    Route::put('/edit-article/{id}', [ArticleController::class, 'update'])->name('admin.article.update');
    Route::delete('/delete-article/{id}', [ArticleController::class, 'destroy'])->name('admin.article.destroy');
});
