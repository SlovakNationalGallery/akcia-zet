<?php

namespace App\Http\Livewire\Admin\Articles;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Collection;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;
use Spatie\Tags\Tag;

class Form extends Component
{
    use WithMedia;

    public Article $article;
    public array $tags;
    public Collection $availableTags;

    // MediaLibraryPro
    public $mediaComponentNames = ['images', 'attachments', 'title_image'];
    public $images;
    public $attachments;
    public $title_image;

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
        'article.published_at' => 'date',
        'tags.*' => 'string',
    ];


    public function mount()
    {
        // Didn't work with article.tags out of the box, so handling tags separately
        $this->tags = $this->article->tags->pluck('name')->toArray();
        $this->availableTags = Tag::all()->pluck('name');
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

        // https://github.com/livewire/livewire/issues/823#issuecomment-651324921
        if($this->article->embed_url === '') $this->article->embed_url = null;

        $this->article->save();

        $this->article
            ->syncFromMediaLibraryRequest($this->images)
            ->toMediaCollection('images');

        $this->article
            ->syncFromMediaLibraryRequest($this->attachments)
            ->toMediaCollection('attachments');

        $this->article
            ->syncFromMediaLibraryRequest($this->title_image)
            ->toMediaCollection('title_image');

        $this->emit('saved');

        if ($this->article->wasRecentlyCreated) {
            session()->flash('message', 'Článok bol vytvorený.');
            return redirect()->route('admin.articles.edit', $this->article);
        }
    }
}
