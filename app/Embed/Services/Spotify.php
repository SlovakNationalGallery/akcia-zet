<?php

namespace App\Embed\Services;

use App\Embed\ServiceBase;
use BenSampo\Embed\ValueObjects\Url;

class Spotify extends ServiceBase
{
    public static function detect(Url $url): bool
    {
        return (new self($url))->trackId() !== null;
    }

    protected function viewData(): array
    {
        return [
            'trackId' => $this->trackId(),
        ];
    }

    protected function viewName(): string
    {
        return 'spotify';
    }

    /**
     * @link https://github.com/OpenCode/awesome-regex#spotify-track
     */
    protected function trackId(): ?string
    {
        preg_match('/^https?:\/\/(?:open|play)\.spotify\.com\/episode\/([\w\d]+)$/i', $this->url, $match);

        if (array_key_exists(1, $match)) {
            return $match[1];
        }

        return null;
    }
}
