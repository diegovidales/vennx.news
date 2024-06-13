<?php

namespace App\Livewire\MyNews;

use App\Livewire\Forms\Filters;
use App\Traits\Searchable;
use Livewire\Component;
use Livewire\WithPagination;

class MyNewsTable extends Component
{
    use WithPagination, Searchable;

    public Filters $filters;

    public function render()
    {
        $query = auth()->user()->news();
        $query = $this->applySearch($query);
        if(isset($this->filters)){
            $query = $this->filters->apply($query);
        }
        return view('livewire.my-news.my-news-table',  [
            'news' => $query->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
