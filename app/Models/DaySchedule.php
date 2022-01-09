<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DaySchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_id', 'template_id', 'time'
    ];


    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }

}
