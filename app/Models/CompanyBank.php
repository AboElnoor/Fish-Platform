<?php

namespace App\Models;

class CompanyBank extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bank';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Bank_ID';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
}
