<?php

namespace Modules\Rates\Models;

use Illuminate\Database\Eloquent\Model;


class Currency extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'iso_code',
    ];
}
