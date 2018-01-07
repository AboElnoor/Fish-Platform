<?php

namespace App\Models;

class Farm extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fishfarm';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'FishFarm_ID';

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'Governorate_ID');
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class, 'Locality_ID');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'Village_ID');
    }
}
