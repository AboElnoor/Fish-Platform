<?php

namespace App;

use App\Models\HSCode;
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
}
