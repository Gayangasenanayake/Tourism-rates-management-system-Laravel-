<?php

namespace Modules\Rates\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupplementType extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title'
    ];

    public function supplement(): BelongsTo
    {
        return $this->belongsTo(Supplement::class);
    }
}
