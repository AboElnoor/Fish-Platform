<?php

namespace App;

use App\Models\Governorate;
use App\Models\HSCode;
use App\Models\Locality;
use App\Models\Market;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'User_ID';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function hSCodes()
    {
        return $this->belongsToMany(HSCode::class, 'hscode_user', $this->primaryKey, 'HSCode_ID');
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'Governorate_ID');
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class, 'Locality_ID');
    }

    public function markets()
    {
        return $this->hasMany(Market::class, 'EntryUser');
    }

    public function requestedMarkets()
    {
        return $this->belongsToMany(Market::class, 'market_request', 'market_id', 'user');
    }
}
