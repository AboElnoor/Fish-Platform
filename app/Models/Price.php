<?php

namespace App\Models;

use App\User;
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

    public function entryUser()
    {
        return $this->belongsTo(User::class, 'EntryUser');
    }

    public function updateUser()
    {
        return $this->belongsTo(User::class, 'UpdateUser');
    }

    public function hSCode()
    {
        return $this->belongsTo(HSCode::class, 'HSCode_ID');
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class, 'PriceDB_Unit', $this->primaryKey, 'Unit_ID')
            ->withPivot('Weights');
    }

    public function getUnitsWeights($unitId)
    {
        return $this->units()->where('PriceDB_Unit.Unit_ID', $unitId)->first()->pivot_Weights ?? null;
    }
}
