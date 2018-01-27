<?php

namespace App\Models;

class Locality extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locality';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Locality_ID';

    public function villages()
    {
        return $this->hasMany(Village::class, $this->primaryKey);
    }
}
