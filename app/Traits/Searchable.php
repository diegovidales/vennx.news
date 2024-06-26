<?php

namespace App\Traits;

trait Searchable
{
    //
    public $search = '';

    public function updatedSearchable($property)
    {
        if($property === 'search') {
            $this->resetPage();
        }
    }

    protected function applySearch($query)
    {
        return $this->search === ''
            ? $query
            : $query->where('title','like','%'.$this->search.'%');
    }
}
