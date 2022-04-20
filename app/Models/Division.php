<?php

namespace App\Models;

use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    use HasFactory;

    protected $guarded =[];

    public $timestamps = false;

    public function position(){
        return $this->hasMany(Position::class);
    }
}
