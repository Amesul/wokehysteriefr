<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DashboardPostController;
use App\Http\Controllers\Dashboard\EpisodeController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\QuestionController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
use App\Models\Episode;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn() => view('home', ['episode' => Episode::findLatest()]));

Route::get('/blog/posts', [PostController::class, 'index']);
Route::get('/blog/tags/{tag:slug}', [PostController::class, 'index']);
Route::get('/blog/authors/{author:username}', [PostController::class, 'index']);
Route::get('/blog/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/about/members', fn() => view('about.members', [
    'users' => User::all()->sortBy('display_name')
]));
Route::patch('/users', [TeamController::class, 'update'])->middleware('auth.admin');

Route::get('/about/faq', [QuestionController::class, 'index']);
Route::get('/about/legal', fn() => view('about.legal'));
Route::get('/contact', fn() => view('contact'));

Route::middleware('auth.writer')->group(function () {
    Route::get('/dashboard/posts', [DashboardPostController::class, 'index']);
    Route::get('/dashboard/posts/create', [DashboardPostController::class, 'create']);
    Route::post('/blog/posts', [DashboardPostController::class, 'store']);
    Route::get('/dashboard/posts/{post:slug}', [DashboardPostController::class, 'edit']);
    Route::patch('/blog/posts/{post:id}', [DashboardPostController::class, 'update']);
    Route::delete('/blog/posts/{post:id}', [DashboardPostController::class, 'destroy']);
});

Route::middleware('auth.admin')->group(function () {
    Route::get('/dashboard/edit', [DashboardController::class, 'index']);
    Route::post('/dashboard/edit/episode', [EpisodeController::class, 'store']);
    Route::get('/dashboard/edit/faq/create', [QuestionController::class, 'create']);
    Route::get('/dashboard/edit/faq/{question:id}', [QuestionController::class, 'edit']);
    Route::post('/about/faq', [QuestionController::class, 'store']);
    Route::patch('/about/faq/{question:id}', [QuestionController::class, 'update']);
    Route::delete('/about/faq/{question:id}', [QuestionController::class, 'destroy']);

    Route::get('/dashboard/users', [UsersController::class, 'index']);
    Route::patch('/users/{user:id}/admin', [UsersController::class, 'update']);
    Route::patch('/users/{user:id}/writer', [UsersController::class, 'update']);
    Route::delete('/users/{user:id}', [UsersController::class, 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/profile', [ProfileController::class, 'edit']);
    Route::patch('/dashboard/profile', [ProfileController::class, 'update']);
    Route::patch('/dashboard/profile/password', [PasswordController::class, 'update']);
    Route::delete('/dashboard/profile', [ProfileController::class, 'destroy']);
});

require __DIR__ . '/auth.php';
require __DIR__ . '/redirects.php';
