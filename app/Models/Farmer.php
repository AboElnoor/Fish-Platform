<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fishfarmer';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'FishFarmer_ID';

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

    public function farms()
    {
        return $this->hasMany(Farm::class, $this->primaryKey);
    }

    public function hSCodes()
    {
        return $this->belongsToMany(HSCode::class, 'fishfarmer_hscode', $this->primaryKey, 'HSCode_ID')
            ->withPivot('FishFarmer_HSCode_ID', 'cropMonth', 'Area', 'PoolCount', 'PoolAvrg', 'Notes');
    }

    public function source()
    {
        return $this->hasOne(FarmerSource::class, $this->primaryKey);
    }

    public function client()
    {
        return $this->hasOne(FarmerClient::class, $this->primaryKey);
    }
}
