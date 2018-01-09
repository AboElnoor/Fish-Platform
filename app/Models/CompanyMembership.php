<?php

namespace App\Models;

class CompanyMembership extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'member';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Member_ID';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
}
