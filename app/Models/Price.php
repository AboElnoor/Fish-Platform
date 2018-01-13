<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'PriceDB';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'PriceDB_ID';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function hSCodes()
    {
        return $this->belongsTo(HSCode::class, $this->primaryKey, 'HSCode_ID');
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class, 'PriceDB_Unit', $this->primaryKey, 'Unit_ID')
            ->withPivot('Weights');
    }
}
