<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SparingRequest extends Model
{
    /** @use HasFactory<\Database\Factories\SparingRequestFactory> */
    use HasFactory;
    protected $guarded = [];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function sparing(): BelongsTo
    {
        return $this->belongsTo(Sparing::class, 'id_sparing');
    }
}
