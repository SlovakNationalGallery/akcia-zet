<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
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
            ->withCustomProperties('date')
            ->toMediaCollection('timelapse');

        // Order timelapse images by date
        Media::setNewOrder(
            $this->setting
              ->getMedia('timelapse')
              ->sortBy('custom_properties.date')
              ->pluck('id')
              ->toArray()
        );

        $this->emit('saved');
    }
}
