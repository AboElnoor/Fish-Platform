<?php

namespace App\Models;

class Market extends Model
{
    public function category()
    {
        return $this->belongsTo(MarketType::class);
    }

    public function hSCode()
    {
        return $this->belongsTo(HSCode::class, 'HSCode_ID');
    }

    public function pType()
    {
        return $this->belongsTo(PtoolsType::class, 'HSCode_ID');
    }

    public function user()
    {
        return $this->hasOne(MarketUser::class);
    }

    public function transport()
    {
        return $this->hasOne(MarketTransport::class);
    }
}
