<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destek extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'level',
        'status',
        'subject',
        'description',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function mesajlar(){
        return $this->hasMany(Message::class,'destek_id');
    }
}
