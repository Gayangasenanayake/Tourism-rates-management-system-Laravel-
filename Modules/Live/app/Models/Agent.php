<?php

namespace Modules\Live\Models;

use Illuminate\Database\Eloquent\Model;



class Agent extends Model
{
    protected $connection = 'insider_360_live';

    protected $fillable = [
        'title',
        'short_name',
        'code',
        'reservation_reply_email',
        'direct_billing_template',
    ];


}
