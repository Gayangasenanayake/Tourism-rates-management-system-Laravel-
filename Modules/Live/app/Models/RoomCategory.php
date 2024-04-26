<?php

namespace Modules\Live\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomCategory extends Model
{
    protected $connection = 'insider_360_live';
    protected $fillable = [
        'title',
        'code',
        'description',
        'hotel_id'
    ];

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
}
