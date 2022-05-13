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
        return $this->belongsTo(category::class, 'FK_categoryCode', 'PK_categoryCode');
    }

    public function cuisinetype(){
        return $this->belongsTo(CuisineType::class, 'FK_cuisineCode', 'PK_cuisineCode');
    }

    public function order(){
        return $this->hasMany(OrderedMenu::class);
    }

    public function images(){
        return $this->hasMany(Image::class, 'FK_menuID', 'PK_menuID');
    }
}
