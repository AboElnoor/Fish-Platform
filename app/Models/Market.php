<?php

namespace App\Models;

use App\User;

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
        return $this->belongsTo(PtoolsType::class, 'ptoolType');
    }

    public function user()
    {
        return $this->hasOne(MarketUser::class);
    }

    public function transport()
    {
        return $this->hasOne(MarketTransport::class);
    }

    public function requesters()
    {
        return $this->belongsToMany(User::class, 'market_request', 'user', 'market_id');
    }
}
