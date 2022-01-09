<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CampaignDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',  'date'
    ];

    protected $casts = [
        'date'  =>  'date'
    ];


    public function times(): HasMany
    {
        return $this->hasMany(DaySchedule::class, 'day_id','id');
    }
}
