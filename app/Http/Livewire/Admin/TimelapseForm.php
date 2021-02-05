<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class TimelapseForm extends Component
{
    use WithMedia;

    public Setting $setting;

    // MediaLibraryPro
    public $mediaComponentNames = ['images'];
    public $images;

    protected $rules = [
        'images.*.custom_properties.date' => 'required|date',
    ];

    public function save()
    {
        $this->validate();

        $this->setting
            ->syncFromMediaLibraryRequest($this->images)
            ->toMediaCollection('timelapse');

        $this->emit('saved');
    }
}
