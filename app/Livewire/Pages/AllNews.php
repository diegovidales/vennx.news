<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\Filters;
use App\Models\News;
use App\Traits\Searchable;
use Livewire\Component;
use Livewire\WithPagination;

class AllNews extends Component
{
    use WithPagination, Searchable;

    public Filters $filters;

    public function render()
    {
        if(News::all()->count() === 0) {
            return view('livewire.pages.all-news', [
                'news' => News::paginate(6)
            ]);
        }
        $query = News::all()->toQuery();
        $query = $this->applySearch($query);
        if(isset($this->filters)){
            $query = $this->filters->apply($query);
        }
        return view('livewire.pages.all-news', [
            'news' => $query->orderBy('created_at', 'desc')->paginate(6)
        ]);
    }
}
