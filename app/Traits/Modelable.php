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
        $this->news->setNews($news);
        $this->showModal = true;
    }
}
