<?php

namespace App\Models;

class Ptool extends Model
{
    public function category()
    {
        return $this->belongsTo(PtoolsType::class, 'type');
    }
}
