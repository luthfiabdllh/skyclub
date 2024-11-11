<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Field extends Model
{
    use HasFactory;
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->attributes['price'], 0, ',', '.');
    }
    public function listBooking(): HasMany
    {
        return $this->hasMany(ListBooking::class);
    }
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }
    public function facility(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class);
    }
}
