<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'description',
    //     'discount',
    //     'code',
    //     'valid_until',
    //     'is_active',
    // ];

    protected $fillable = [
        'expire_date',
        'code',
        'quota',
        'discount_price',
        'discount_percentage',
        'max_discount',
        'min_price',
    ];

    public function booking(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
