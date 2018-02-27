<?php

namespace App\Models;

class Gallery extends Model
{
    public function category()
    {
        return $this->belongsTo(CompanyType::class, 'FishCompanyType_ID');
    }
}
