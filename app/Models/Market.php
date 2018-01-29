<?php

namespace App\Models;

class Market extends Model
{
    public function hSCode()
    {
        return $this->belongsTo(HSCode::class, 'HSCode_ID');
    }
}
