<?php

use App\Http\Controllers\Admin\ArticleController;
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
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/pripravujeme', function () {
        $setting = Setting::first();
        return view('admin.coming-soon.form', compact('setting'));
    })->name('coming_soon.edit');

    Route::resource('articles', ArticleController::class);

    Route::mediaLibrary();
});
