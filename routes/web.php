<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Author\PostsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboarController;
use App\Http\Controllers\Author\AuSettingController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdSubscriberController;
use App\Http\Controllers\Author\AuthorCommentController;
use App\Http\Controllers\Author\AuthorDashboarController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{slug}', [HomeController::class, 'post'])->name('post');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category');
Route::get('/tag/{slug}', [HomeController::class, 'tag'])->name('tag');

// Redirect After LogIn
Route::get('redirect', [LoginController::class, 'index']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['as' => 'admin.', 'prefix' => 'admin',  'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', [DashboarController::class, 'index'])->name('dashboard');
    Route::resource('/tag', TagController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/post', PostController::class);

    Route::any('post/approve/{id}', [PostController::class, 'approve'])->name('post.approved');
    Route::get('/subscribers', [AdSubscriberController::class, 'index'])->name('subscribers.index');
    Route::any('/subscribers/{id}', [AdSubscriberController::class, 'delete'])->name('subscribers.delete');

    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::any('/setting/profile/update/{id}', [SettingController::class, 'update'])->name('profile.update');
    Route::any('/password/{id}', [SettingController::class, 'passupdate'])->name('password.update');

    Route::get('favorite', [FavoriteController::class, 'index'])->name('favorite');
    Route::any('favorite/{id}', [FavoriteController::class, 'delete'])->name('favorite.delete');

    Route::get('comment', [AdminCommentController::class, 'index'])->name('comment');
    Route::delete('comment/{id}', [AdminCommentController::class, 'delete'])->name('comment.delete');


    Route::get('Author/', [AuthorController::class, 'index'])->name('author');
    Route::delete('Author/{id}', [AuthorController::class, 'delete'])->name('author.delete');
});

Route::group(['as' => 'author.', 'prefix' => 'author', 'middleware' => ['auth', 'author']], function () {

    Route::get('dashboard', [AuthorDashboarController::class, 'index'])->name('dashboard');
    Route::resource('/post', PostsController::class);

    Route::get('/author-profile', [AuSettingController::class, 'index'])->name('profile.index');
    Route::any('/author-profile/update/{id}', [AuSettingController::class, 'update'])->name('profile.update');
    Route::any('/author-profile/password/{id}', [AuSettingController::class, 'passupdate'])->name('password.update');

    Route::get('favorite', [FavoriteController::class, 'index'])->name('favorite');
    Route::any('favorite/{id}', [FavoriteController::class, 'delete'])->name('favorite.delete');

    Route::get('comment', [AuthorCommentController::class, 'index'])->name('comment');
    Route::delete('comment/{id}', [AuthorCommentController::class, 'delete'])->name('comment.delete');
});
Route::get('/add/subscriber', [SubscriberController::class, 'store'])->name('add.subscriber');

Route::group(['middleware' => 'auth'], function () {
    Route::post('favorite/{id}', [FavoriteController::class, 'add'])->name('post.favorite');
    Route::post('comment/{post}', [CommentController::class, 'store'])->name('comment.store');
});


// view()->composer('layouts.fontend.partial.footer', function ($view) {
// });
View::composer('layouts.fontend.partial.footer', function ($view) {
    $categories = Category::all();
    $view->with('categories', $categories);
});
