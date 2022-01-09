<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        static::updated(function($campaign){
            $date = Carbon::parse($campaign->start_date);
            for ($i=0; $i< $campaign->how_many_days;  $i++) {
                $campaign->days()->create([
                        'date'  =>  $date,
                ]);
                $date = $date->addDay();
            }
        });
        static::created(function($campaign){
            $date = Carbon::parse($campaign->start_date);
            for ($i=0; $i< $campaign->how_many_days;  $i++) {
                $campaign->days()->create([
                        'date'  =>  $date,
                ]);
                $date = $date->addDay();
            }
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


    public function times()
    {
        return $this->hasManyThrough(DaySchedule::class, CampaignDay::class,'campaign_id','day_id');
    }

}
