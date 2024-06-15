<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\NewsForm;
use App\Models\News;
use App\Traits\Modelable;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteNews extends Component
{
    use Modelable;

    public function delete()
    {
        $this->authorize('delete', $this->news->news); 
        $this->news->delete();
        $this->dispatch('my-news-update'); // envia para a tabela que houve uma mudança
    }

    #[On('show-delete-news-modal')]
    public function showModal(News $news)
    {
        $this->openModal($news);
    }
}
