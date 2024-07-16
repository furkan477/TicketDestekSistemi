<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'cat_ust',
        'status',
    ];  


    public function subcategory(){
        return $this->hasMany(Category::class,'cat_ust');
    }

    public function destekler(){
        return $this->hasMany(Destek::class,'category_id');
    }
}
