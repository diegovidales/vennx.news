<?php

namespace App\Livewire\Modals;

use App\Models\News;
use App\Traits\Modelable;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowNews extends Component
{
    use Modelable;

    #[On('show-news-modal')]
    public function showModal(News $news)
    {
        $this->openModal($news);
    }
}
