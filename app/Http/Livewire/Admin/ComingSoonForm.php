<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Setting;

class ComingSoonForm extends Component
{
    public Setting $setting;

    protected $rules = [
        'setting.coming_soon' => 'string',
    ];

    public function save()
    {
        $this->validate();
        $this->setting->save();
        $this->emit('saved');
    }
}
