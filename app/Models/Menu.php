<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps=true;

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function cuisinetype(){
        return $this->belongsTo(CuisineType::class);
    }

    public function order(){
        return $this->hasMany(OrderedMenu::class);
    }

    public $timestamps = false;
}

