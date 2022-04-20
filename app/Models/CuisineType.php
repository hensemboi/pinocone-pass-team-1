<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CuisineType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function menu(){
        return $this->hasMany(Menu::class);
    }
}
