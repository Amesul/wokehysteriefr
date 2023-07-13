<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DashboardPostController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
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
Route::get('/about/legal', fn() => view('about.legal',));

Route::get('/contact', fn() => view('contact',));

Route::get('/dashboard/posts', [DashboardPostController::class, 'index'])->middleware('auth.writer');
Route::get('/dashboard/posts/create', [DashboardPostController::class, 'create'])->middleware('auth.writer');
Route::post('/blog/posts', [DashboardPostController::class, 'store'])->middleware('auth.writer');
Route::get('/dashboard/posts/{post:slug}', [DashboardPostController::class, 'edit'])->middleware('auth.writer');
Route::delete('/blog/posts/{post:id}', [DashboardPostController::class, 'destroy'])->middleware('auth.writer');

Route::get('/dashboard/edit', [DashboardController::class, 'index'])->middleware('auth.admin');

Route::get('/dashboard/users', [UsersController::class, 'index'])->middleware('auth.admin');
Route::patch('/users/{user:id}', [UsersController::class, 'update'])->middleware('auth.admin');
Route::delete('/users/{user:id}', [UsersController::class, 'destroy'])->middleware('auth.admin');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/profile', [ProfileController::class, 'edit']);
    Route::patch('/dashboard/profile', [ProfileController::class, 'update']);
    Route::patch('/dashboard/profile/password', [PasswordController::class, 'update']);
    Route::delete('/dashboard/profile', [ProfileController::class, 'destroy']);
});

require __DIR__ . '/auth.php';
