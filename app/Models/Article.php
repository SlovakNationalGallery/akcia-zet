<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

class Article extends Model implements HasMedia
{
    use HasFactory;
    use HasSlug;
    use HasTags;
    use InteractsWithMedia;

    protected $casts = [
        'published_at' => 'datetime:Y-m-d', // Requied by <input type="date">
    ];

    // Used to distinguish 'Pridane' articles from 'Texty' articles
    private $researchArticlesSlugs = [
        'cold-revolution',
        'z-vyskumu-obrazu',
        'ztraceny-svaty',
        'prerusena-piesen',
    ];

    public function scopePublished($query)
    {
        return $query
            ->where('published_at', '<', Carbon::now())
            ->whereNotIn('slug', $this->researchArticlesSlugs);
    }

    public function scopeResearch($query)
    {
        return $query
            ->whereIn('slug', $this->researchArticlesSlugs);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getIsPublishedAttribute(): bool {
        if (!$this->published_at) return false;
        return $this->published_at->isPast();
    }

    public function getWillBePublishedAttribute() {
        if (!$this->published_at) return false;
        return $this->published_at->isFuture();
    }

    public function hasTitleImage(): bool {
        return $this->hasMedia('title_image');
    }

    public function getTitleImageAttribute() {
        return $this->getFirstMedia('title_image');
    }

    public function getFirstContentParagraphAttribute() {
        if (!$this->content) return;

        $start = strpos($this->content, '<p>');
        $end = strpos($this->content, '</p>', $start);
        return substr($this->content, $start, $end - $start + Str::length('</p>'));
    }

    // Required for MediaLibraryPro components to show thumbnails of uploaded images
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('images')
           ->withResponsiveImages();

        $this
            ->addMediaCollection('attachments');

        $this
            ->addMediaCollection('title_image')
            ->withResponsiveImages()
            ->singleFile();
    }
}
