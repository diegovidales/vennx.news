<?php

namespace App\Livewire\Forms;

use App\Enums\Range;
use Livewire\Attributes\Url;

use Livewire\Form;

class Filters extends Form
{
    #[Url]
    public Range $range = Range::All_Time;

    public function apply($query)
    {
        if($this->range === Range::All_Time) {
            return $query;
        }
        return $query->whereBetween('created_at', $this->range->dates());
    }
}
