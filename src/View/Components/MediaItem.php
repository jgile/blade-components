<?php

namespace JGile\BladeComponents\View\Components;

use Illuminate\View\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaItem extends Component
{
    protected Media $media;

    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    public function render()
    {
        return view("blade-components::components.media-item", [
            'media' => $this->media
        ]);
    }
}