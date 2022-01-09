<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DaySchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_id', 'template_id', 'time','is_complete'
    ];

    protected $casts = [
        'is_complete'   =>  'boolean'
    ];


    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }

    public function day()
    {
        return $this->belongsTo(CampaignDay::class,'day_id','id');
    }

}
