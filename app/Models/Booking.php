<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $with = ['user', 'voucher', 'userInfo'];
    protected $guarded = [];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
}
