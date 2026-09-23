<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = [
        'title',
        'image',
        'type',
        'state',
        'status',
        'user_id'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}