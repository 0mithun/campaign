<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    use HasFactory;


     /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::updating(function($campaign){
            $campaign->days()->each(function($day){
                $day->delete();
            });
        });
    }

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

    public function days(): HasMany
    {
        return $this->hasMany(CampaignDay::class,'campaign_id', 'id');
    }



}
