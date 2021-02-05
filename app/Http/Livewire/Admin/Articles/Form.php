<?php

namespace App\Http\Livewire\Admin\Articles;

use Livewire\Component;
use App\Models\Article;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;
use Spatie\Tags\Tag;

class Form extends Component
{
    use WithMedia;

    public Article $article;
    public array $tags;

    // MediaLibraryPro
    public $mediaComponentNames = ['images'];
    public $images;

    /**
     * Indicates if user deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingDeletion = false;

    public $embedPreviewUrl;

    protected $rules = [
        'article.title' => 'required|string',
        'article.slug' => 'string',
        'article.perex' => 'string',
        'article.content' => 'string',
        'article.embed_url' => 'string',
        'article.published' => 'required|boolean',
        'tags.*' => 'string',
    ];


    public function getAvailableTagsProperty()
    {
        return Tag::all()->pluck('name')->toArray();
    }

    public function mount()
    {
        // TODO maybe this is not the best place for setting defaults
        $this->article->published = $this->article->published ?? false;

        // Didn't work with article.tags out of the box, so handling tags separately
        $this->tags = $this->article->tags->pluck('name')->toArray();
    }

    public function confirmDeletion()
    {
        $this->confirmingDeletion = true;
    }

    public function delete()
    {
        $this->article->delete();
        session()->flash('message', 'Článok bol vymazaný.');
        return redirect()->route('admin.articles.index');
    }

    public function save()
    {
        $this->validate();

        $this->article->tags = $this->tags;

        if($this->article->exists) {
            $this->validate(['article.slug' => 'required|string',]);
        }

        $this->article->save();

        $this->article
            ->syncFromMediaLibraryRequest($this->images)
            ->toMediaCollection('images');

        $this->emit('saved');

        if ($this->article->wasRecentlyCreated) {
            session()->flash('message', 'Článok bol vytvorený.');
            return redirect()->route('admin.articles.edit', $this->article);
        }
    }
}
