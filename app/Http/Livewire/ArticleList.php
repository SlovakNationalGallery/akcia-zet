<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Collection;
use Livewire\Component;

class ArticleList extends Component
{
    public $tags;
    public $tag;

    protected $queryString = ['tag'];

    public function render()
    {
        $articles = Article::published();
        if ($this->tag) $articles = $articles->withAnyTags($this->tag);

        return view('livewire.article-list', [
            'articles' => $articles->get()
        ]);
    }
}
