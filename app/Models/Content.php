<?php

namespace App\Models;

class Content extends Model
{
    public function category()
    {
        return $this->belongsTo(ContentType::class, 'type');
    }
}
