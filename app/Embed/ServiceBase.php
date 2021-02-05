<?php

namespace App\Embed;

use BenSampo\Embed\ServiceBase as EmbedServiceBase;
use Illuminate\Contracts\View\View;

abstract class ServiceBase extends EmbedServiceBase
{
    public function view(): View
    {
        return view('vendor.embed.services.' . $this->viewName(), array_merge($this->viewData(), [
            'aspectRatio' => $this->aspectRatio(),
        ]));
    }
}
