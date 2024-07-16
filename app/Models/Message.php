<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'destek_id',
        'message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function destek()
    {
        return $this->belongsTo(Destek::class);
    }
}
