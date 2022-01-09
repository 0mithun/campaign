<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','name', 'start_date', 'how_many_days', 'emails'
    ];

    protected $casts = [
        'start_date'  =>  'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
