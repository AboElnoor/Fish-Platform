<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot as PivotEloquent;

class Pivot extends PivotEloquent
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
