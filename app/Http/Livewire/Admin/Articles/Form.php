<?php

namespace App\Http\Livewire\Admin\Articles;

use Livewire\Component;
use App\Models\Article;

class Form extends Component
{
    public Article $article;

    protected $rules = [
        'article.title' => 'required|string',
        'article.slug' => 'string',
        'article.perex' => 'string',
        'article.content' => 'string',
        'article.published' => 'required|boolean',
    ];

    public function mount()
    {
        // TODO maybe this is not the best place for setting defaults
        $this->article->published = $this->article->published ?? false;
    }

    public function save()
    {
        $this->validate();

        $this->article->save();

        $this->emit('saved');

        if ($this->article->wasRecentlyCreated) {
            session()->flash('message', 'Článok bol vytvorený.');
            return redirect()->route('admin.articles.edit', $this->article);
        }
    }
}
