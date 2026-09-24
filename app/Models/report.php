<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class report extends Model
{
    protected $fillable = [
        'report',
        'user_id',
        'admin_reply',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
