<?php

use App\Http\Controllers\PostInfoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDataController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/post', [PostInfoController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostInfoController::class, 'create'])->name('post.create');
    Route::get('list-users', [UserDataController::class, 'index']);
    Route::post('/post/store', [PostInfoController::class, 'store'])->name('post.store');
    Route::get('/post/{id}/edit', [PostInfoController::class, 'edit'])->name('post.edit');
    Route::post('/post/update/{id}', [PostInfoController::class, 'update'])->name('post.update');
    Route::delete('/post/delete/{post_id}', [PostInfoController::class, 'destroy'])->name('post.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
