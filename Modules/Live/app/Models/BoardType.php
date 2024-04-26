<?php

namespace Modules\Live\Models;

use Illuminate\Database\Eloquent\Model;


class BoardType extends Model
{
    protected $connection = 'insider_360_live';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'code',
    ];


}
