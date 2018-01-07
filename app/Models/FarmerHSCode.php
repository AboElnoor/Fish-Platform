<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FarmerHSCode extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fishfarmer_hscode';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'FishFarmer_HSCode_ID';
}
