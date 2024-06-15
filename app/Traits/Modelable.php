<?php

namespace App\Traits;

use App\Livewire\Forms\NewsForm;
use App\Models\News;

trait Modelable
{
    //
    public $showModal = false;

    public NewsForm $news;

    public function openModal(News $news)
    {
        $this->resetValidation();
        $this->news->setNews($news);
        $this->showModal = true;
    }

    public function updatedImage()
    {
        if(empty($this->image))
        {
            $this->news->image_path = null;
            return null;
        }
        try {
            $this->validate([
                'image' => 'image',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->reset('image');
            $this->news->image_path = null;
        }
    }
}
