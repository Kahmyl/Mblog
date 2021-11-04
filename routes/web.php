<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Blog\BlogController;

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
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Blog/main');
})->name('root');

Route::get('/entertain', function () {
    return Inertia::render('Blog/Entertainment');
})->name('entertain');

Route::get('/art', function () {
    return Inertia::render('Blog/Art');
})->name('art');

Route::get('/sport', function () {
    return Inertia::render('Blog/Sport');
})->name('sport');

Route::get('/blog', function () {
    return Inertia::render('Blog/Details');
})->name('details');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/post-blog', function () {
    return Inertia::render('Blog/AddBlog');
})->name('post-blog');

Route::get('/blogs', [BlogController::class, 'blogs']);
Route::get('/blup', [BlogController::class, 'blogDetails']);
Route::post('/post', [BlogController::class, 'postBlogs']);

