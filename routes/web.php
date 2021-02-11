<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Models\Article;
use App\Models\Setting;
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

Route::get('/', function () {
    return view('welcome-old');
});

Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/pripravujeme', function () {
        $setting = Setting::first();
        return view('admin.coming-soon.form', compact('setting'));
    })->name('coming_soon.edit');

    Route::get('/casozber', function () {
        $setting = Setting::first();
        return view('admin.timelapse.form', compact('setting'));
    })->name('timelapse.edit');

    Route::resource('articles', ArticleController::class);

    Route::mediaLibrary();
});

Route::prefix('preview')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        $articles = Article::all();
        return view('welcome', compact('articles'));
    })->name('dashboard');
});
