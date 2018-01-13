<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fishcompany';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'FishCompany_ID';

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

    public function activitytypes()
    {
        return $this->belongsToMany(
            ActivityType::class,
            'fishcompany_activitytype',
            $this->primaryKey,
            'ActivityType_ID'
        );
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, $this->primaryKey);
    }

    public function managers()
    {
        return $this->hasMany(CompanyManager::class, $this->primaryKey);
    }

    public function banks()
    {
        return $this->belongsToMany(CompanyBank::class, 'fishcompany_bank', $this->primaryKey, 'Bank_ID');
    }

    public function memberships()
    {
        return $this->belongsToMany(CompanyMembership::class, 'fishcompany_member', $this->primaryKey, 'Member_ID');
    }

    public function hSCodes()
    {
        return $this->belongsToMany(HSCode::class, 'fishcompany_hscode', $this->primaryKey, 'HSCode_ID');
    }

    public function clntSplrs()
    {
        return $this->belongsToMany(CompanyClntSplr::class, 'fishcompany_clntsplr', $this->primaryKey, 'ClntSplr_ID')
            ->withPivot('Type_ID');
    }

    public function source()
    {
        return $this->hasOne(CompanySource::class, $this->primaryKey);
    }
}
