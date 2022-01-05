<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserEmailSetting extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id', 'mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_encryption',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
