<?php

namespace App\Enums;

use Illuminate\Support\Carbon;

enum Range: string
{
    case All_Time = 'all';
    case Today = 'today';
    case Year = 'year';
    case Month = 'month';
    case Last_30 = 'last30';
    case Last_7 = 'last7';
    /* case Custom = 'custom'; */

    public function label()
    {
        return match ($this) {
            static::All_Time => 'Todos',
            static::Year => 'Este ano',
            static::Month => 'Este mês',
            static::Last_30 => 'Ultimos 30 dias',
            static::Last_7 => 'Ultimos 7 dias',
            static::Today => 'Hoje',
            /* static::Custom => 'Personalizado' */
        };
    }

    public function dates()
    {
        return match ($this) {
            static::Today => [Carbon::today(), now()],
            static::Last_7 => [Carbon::today()->subDays(6), now()],
            static::Last_30 => [Carbon::today()->subDays(29), now()],
            static::Year => [Carbon::now()->startOfYear(), now()],
            static::Month => [Carbon::now()->startOfMonth(), now()],
        };
    }
}