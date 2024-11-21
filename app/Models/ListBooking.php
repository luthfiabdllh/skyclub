<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ListBooking extends Model
{
    use HasFactory;
    protected $with = ['booking', 'field'];
    protected $guarded = [];
    public function getFormattedSessionAttribute()
    {
        return str_pad($this->attributes['session'] - 1, 2, '0', STR_PAD_LEFT) . ':00 - ' . str_pad($this->attributes['session'], 2, '0', STR_PAD_LEFT) . ':00';
    }
    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])->format('d F Y');
    }
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'id_booking', 'id');
    }

    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class, 'id_field');
    }
    public function sparing(): HasOne
    {
        return $this->hasOne(Sparing::class, 'id_list_booking');
    }
    public function requestReschedule(): HasOne
    {
        return $this->hasOne(RescheduleRequest::class, 'id_list_booking');
    }
}
