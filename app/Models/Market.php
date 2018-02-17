<?php

namespace App\Models;

class Market extends Model
{
    public function hSCode()
    {
        return $this->belongsTo(HSCode::class, 'HSCode_ID');
    }

    public function pType()
    {
        return $this->belongsTo(PToolsType::class, 'HSCode_ID');
    }
}
