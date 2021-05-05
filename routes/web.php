<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Models\Article;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
    $articles = Article::published()->orderBy('published_at', 'desc')->take(4)->get();
    $featuredArticle = $articles->shift();

    $timelapseImages = Setting::first()->getMedia('timelapse');
    $timelapseImagesDates = $timelapseImages
        ->map(fn ($image) => Carbon::parse($image->getCustomProperty('date')));

    $researchArticles = Article::whereIn('slug', ['ztraceny-svaty', 'z-vyskumu-obrazu'])->get();

    return view('welcome', compact('articles', 'featuredArticle', 'timelapseImages', 'timelapseImagesDates', 'researchArticles'));
})->name('home');

Route::get('/akteri', function () {
    $articles = Article::published()->orderBy('published_at', 'desc')->take(2)->get();
    return view('actors', compact('articles'));
})->name('actors');

Route::get('/pridane', function (Request $request) {
    $articles = Article::published()->with('tags')->orderBy('published_at', 'desc');
    $tag = $request->get('tag');

    if ($tag) $articles = $articles->withAnyTags($tag);
    $articles = $articles->get();

    $comingSoon = Setting::first()->coming_soon;

    return view('articles.index', compact('articles', 'tag', 'comingSoon'));
})->name('articles.index');

Route::get('/pridane/{article:slug}', function (Article $article) {
    $articles = Article::published()->orderBy('published_at')->get();
    $articleIndex = $articleIndex = $articles->search(fn ($haystack) => $haystack->id == $article->id);

    // Wrap-around next and prev articles
    $nextArticle = $articles
        ->slice($articleIndex + 1)
        ->first()
        ??
        $articles->first();

    $prevArticle = $articles
        ->slice(0, $articleIndex)
        ->last()
        ??
        $articles->last();


    return view('articles.show', compact('article', 'nextArticle', 'prevArticle'));
})->name('articles.show');

Route::get('/texty', function () {
    $articles = Article::research()->get();

    // Re-order articles
    $articles = collect([
        $articles->firstWhere('slug', 'ztraceny-svaty'),
        $articles->firstWhere('slug', 'cold-revolution'),
        $articles->firstWhere('slug', 'z-vyskumu-obrazu'),
        $articles->firstWhere('slug', 'prerusena-piesen'),
    ])->filter();

    return view('research-articles.index', compact('articles'));
})->name('research-articles.index');

Route::get('/texty/{article:slug}', function (Article $article) {
    return view('research-articles.show', compact('article'));
})->name('research-articles.show');

Route::get('/preco', function () {
    $articles = Article::published()->orderBy('published_at', 'desc')->take(2)->get();
    return view('about', compact('articles'));
})->name('about');

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
