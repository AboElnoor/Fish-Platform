<?php

namespace App\Models;

class MarketTransport extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'market_transport';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['transportDate'];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'Governorate_ID');
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class, 'Locality_ID');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'Village_ID');
    }
}
