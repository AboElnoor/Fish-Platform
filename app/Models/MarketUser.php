<?php

namespace App\Models;

class MarketUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'market_user';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['startDate', 'endDate'];
}
