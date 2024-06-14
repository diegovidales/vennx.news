<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\NewsForm;
use App\Models\News;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UpdateNews extends Component
{
    use WithFileUploads;
    
    public $showModal = false;

    public NewsForm $news;
    public $image;
    public $showSuccessIndicator = false;

    public function save()
    {
        $this->news->update($this->image);
        $this->image = null;
        $this->showSuccessIndicator = true;
        $this->dispatch('my-news-update'); // envia para a tabela que houve uma mudança
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

    #[On('show-update-news-modal')]
    public function openModal(News $news)
    {
        $this->news->setNews($news);
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.modals.update-news');
    }
}
