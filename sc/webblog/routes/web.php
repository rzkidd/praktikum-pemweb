<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('index', [
        'title' => 'Home',
        'posts' => Post::all()
    ]);
});
Route::get('/posts/{post:id}', function (Post $post) {
    return view('post', [
        'title' => $post->title,
        'post' => $post->load('author')
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PostController::class, 'index']);
    Route::get('/dashboard/create', [PostController::class, 'create']);
    Route::post('/dashboard/create', [PostController::class, 'store']);
    Route::get('/dashboard/{post:id}', [PostController::class, 'show']);
    Route::get('/dashboard/{post:id}/edit', [PostController::class, 'edit']);
    Route::post('/dashboard/{post:id}/edit', [PostController::class, 'update']);
    Route::post('/dashboard/{post:id}/delete', [PostController::class, 'destroy']);
});


