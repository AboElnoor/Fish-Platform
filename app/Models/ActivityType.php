<?php

namespace App\Models;

class ActivityType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activitytype';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ActivityType_ID';

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'fishcompany_activitytype', $this->primaryKey, 'FishCompany_ID');
    }
}
