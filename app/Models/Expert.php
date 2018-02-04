<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
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
}
