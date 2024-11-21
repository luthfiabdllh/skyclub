<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;
    protected $with = ['rentedBy', 'voucher', 'userInfo'];
    protected $guarded = [];
    public function getFormattedOrderDateAttribute()
    {
        return Carbon::parse($this->attributes['order_date'])->format('d F Y');
    }
    public function rentedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'rented_by');
    }
    public function listBooking(): HasMany
    {
        return $this->hasMany(ListBooking::class, 'id_booking', 'id');
    }
    public function voucher(): BelongsTo
    {
        return $this->belongsTo(Voucher::class);
    }
    public function userInfo(): BelongsTo
    {
        return $this->belongsTo(UserInfo::class);
    }
    public function review(): HasOne
    {
        return $this->hasOne(Review::class, 'id_booking');
    }
}
