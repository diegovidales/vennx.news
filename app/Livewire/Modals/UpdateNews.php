<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\NewsForm;
use App\Models\News;
use App\Traits\Modelable;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UpdateNews extends Component
{
    use WithFileUploads, Modelable;
    
    public $image;
    public $showSuccessIndicator = false;

    public function save()
    {
        // se for uma notícia existente, atualiza
        if($this->news->news->id){
            $this->authorize('update', $this->news->news); 
            $this->news->update($this->image);
        } else {
            // caso não existe, cria uma nova
            $this->authorize('create', $this->news->news);
            $this->news->create($this->image);
        }      
        $this->image = null;
        $this->showSuccessIndicator = true;
        $this->dispatch('my-news-update'); // envia para a tabela que houve uma mudança
    }

    #[On('show-update-news-modal')]
    public function showModal(News $news)
    {
        $this->openModal($news);
    }
}
