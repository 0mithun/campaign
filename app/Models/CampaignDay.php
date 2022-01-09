<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',  'date'
    ];

    protected $casts = [
        'date'  =>  'date'
    ];
}
