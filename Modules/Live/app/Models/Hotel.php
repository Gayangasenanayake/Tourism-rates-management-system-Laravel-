<?php

namespace Modules\Live\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static where(string $string, $id)
 */
class Hotel extends Model
{
    protected $connection = 'insider_360_live';

    protected $fillable = [
        'title',
        'contact_number',
        'email',
        'reservation_email',
        'reservation_email_cc',
        'address_line_1',
        'address_line_2',
        'zip_code',
        'web_site',
    ];

    public function roomCategories(): HasMany
    {
        return $this->hasMany(RoomCategory::class);
    }
}
