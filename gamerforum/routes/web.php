<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Public routes
Route::get('/', [NewsController::class, 'index']);
Route::get('/news/{news}', [NewsController::class, 'show']);
Route::get('/profile/{user}', [ProfileController::class, 'show']);
Route::get('/faq', [FaqController::class, 'index']);
Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/threads', [ThreadController::class, 'index']);
Route::get('/threads/{thread}', [ThreadController::class, 'show']);
Route::get('/', [HomeController::class, 'index']);



// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::post('/profile', [ProfileController::class, 'update']);
    Route::post('/news/{news}/comment', [ReplyController::class, 'store']);
    Route::post('/faq/question', [FaqController::class, 'store']);
    Route::post('/threads', [ThreadController::class, 'store']);
    Route::post('/threads/{thread}/reply', [ReplyController::class, 'store']);
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/news', NewsController::class)->except(['index', 'show']);
    Route::resource('admin/faq', FaqController::class)->except(['index']);
    Route::get('admin/contact', [ContactController::class, 'index']);
    Route::post('admin/contact/{contact}', [ContactController::class, 'reply']);
    Route::post('admin/promote/{user}', [AdminController::class, 'promote']);
});
