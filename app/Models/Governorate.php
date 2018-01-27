<?php

namespace App\Models;

class Governorate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'governorate';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Governorate_ID';

    public function localities()
    {
        return $this->hasMany(Locality::class, $this->primaryKey);
    }
}
