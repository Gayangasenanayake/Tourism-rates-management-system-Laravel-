<?php

namespace Modules\Rates\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplement extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'supplement_type_id',
    ];

    public function supplementTypes(): HasMany
    {
        return $this->hasMany(SupplementType::class);
    }
}
