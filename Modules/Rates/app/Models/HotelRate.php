<?php

namespace Modules\Rates\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Live\Models\BoardType;
use Modules\Live\Models\Hotel;
use Modules\Live\Models\RoomCategory;


/**
 * @method static create(array $all)
 * @method static where(string $string, $id)
 * @method static find($id)
 */
class HotelRate extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'value',
        'date',
        'hotel_id',
        'room_type_id',
        'board_type_id',
        'agent_id',
        'room_category_id',
        'currency_id',
    ];

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    public function boardType(): BelongsTo
    {
        return $this->belongsTo(BoardType::class);
    }

    public function roomCategory(): BelongsTo
    {
        return $this->belongsTo(RoomCategory::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }
}
