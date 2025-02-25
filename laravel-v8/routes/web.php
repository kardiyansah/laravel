<?php

use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Faker\Provider\Lorem;

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
    return view('home.index', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about.index', [
        'title' => 'About Page',
        'name' => 'John Doe',
        'email' => 'johndoe@gmail.com',
        'image' => '2.jpg'
    ]);
});

// Routes Posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Routes Categories
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);

// Routes Authors
Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/{author:username}', [AuthorController::class, 'show']);

// Routes Login and Register
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

// Dashboard Posts
Route::get('/dashboard/posts/checkslug', [DashboardPostController::class, 'checkslug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Admin Categories
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
