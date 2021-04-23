<?php

namespace App\View\Components;

use App\Embed\Services\Issuu;
use App\Embed\Services\Spotify;
use BenSampo\Embed\ViewComponents\EmbedViewComponent;

class ExtendedEmbed extends EmbedViewComponent
{
    public function render(): string
    {

        $detectedService = $this->detectServiceByUrl();

        if ($detectedService) {
            $this->service = $detectedService;

            return $this->service
                ->setAspectRatio($this->aspectRatio)
                ->cacheAndRender();
        }

        return parent::render();
    }

    private function detectServiceByUrl()
    {
        if (Spotify::detect($this->url)) return new Spotify($this->url);
        if (Issuu::detect($this->url)) return new Issuu($this->url);
    }
}
