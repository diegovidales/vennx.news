<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\Filters;
use App\Traits\Searchable;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class MyNews
 extends Component
{
    use WithPagination, Searchable;

    public Filters $filters;

    #[Computed]
    #[On('my-news-update')] //para atualizar sempre que realizar alguma mudança na lista
    public function news()
    {
        $query = auth()->user()->news();
        $query = $this->applySearch($query);
        if(isset($this->filters)){
            $query = $this->filters->apply($query);
        }
        return $query->orderBy('created_at', 'desc')->paginate(10);
    }
}
