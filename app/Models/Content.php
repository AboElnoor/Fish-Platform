<?php

namespace App\Models;

class Content extends Model
{
    public function type()
    {
        return $this->belongsTo(ContentType::class, 'type');
    }
}
