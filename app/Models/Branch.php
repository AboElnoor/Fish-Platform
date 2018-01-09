<?php

namespace App\Models;

class Branch extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fishcompany_branch';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'FishCompany_Branch_ID';

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
