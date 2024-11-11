<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sparing extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function otherTeam(): BelongsTo
    {
        return $this->belongsTo(User::class, 'other_team');
    }
    public function listBooking(): BelongsTo
    {
        return $this->belongsTo(ListBooking::class, 'id_list_booking');
    }
}
