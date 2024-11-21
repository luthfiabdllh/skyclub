<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RescheduleRequest extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function listBooking(): BelongsTo
    {
        return $this->belongsTo(ListBooking::class, 'id_list_booking');
    }
}
