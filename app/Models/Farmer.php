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
        return $this->hasMany(Farm::class, 'FishFarmer_ID');
    }

    public function hSCodes()
    {
        return $this->belongsToMany(HSCode::class, 'fishfarmer_hscode', 'FishFarmer_ID', 'HSCode_ID')
            ->withPivot('FishFarmer_HSCode_ID', 'cropMonth', 'Area', 'PoolCount', 'PoolAvrg', 'Notes');
    }

    public function sources()
    {
        return $this->hasMany(FarmerSource::class, 'FishFarmer_ID');
    }

    public function clients()
    {
        return $this->hasMany(FarmerClient::class, 'FishFarmer_ID');
    }
}
