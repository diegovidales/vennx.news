<?php

namespace App\Livewire\News;

use App\Livewire\Forms\Filters;
use App\Models\News;
use App\Traits\Searchable;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination, Searchable;

    public Filters $filters;

    public function render()
    {
        $query = News::all()->toQuery();
        $query = $this->applySearch($query);
        if(isset($this->filters)){
            $query = $this->filters->apply($query);
        }
        return view('livewire.news.table', [
            'news' => $query->orderBy('created_at', 'desc')->paginate(6)
        ]);
    }
}
