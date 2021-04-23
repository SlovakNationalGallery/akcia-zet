<?php

namespace App\Embed\Services;

use App\Embed\ServiceBase;
use BenSampo\Embed\ValueObjects\Url;

class Issuu extends ServiceBase
{
    const URL_REGEX = '/^https?:\/\/issuu\.com\/(.+?)\/docs\/(.+?)$/i';

    public static function detect(Url $url): bool
    {
        return preg_match(self::URL_REGEX, $url);
    }

    protected function viewData(): array
    {
        return $this->urlParameters();
    }

    protected function viewName(): string
    {
        return 'issuu';
    }

    protected function urlParameters(): ?array
    {
        preg_match(self::URL_REGEX, $this->url, $match);

        if (array_key_exists(1, $match) && array_key_exists(2, $match)) {
            return [
                'user' => $match[1],
                'document' => $match[2]
            ];
        }

        return null;
    }
}
