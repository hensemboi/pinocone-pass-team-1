<?php

namespace App\Models;

use App\Models\Staff;
use App\Models\Division;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;

    protected $guarded=[];

    public $timestamps=false;

    public function division(){
        return $this->belongsTo(Division::class);
    }

    public function staff(){
        return $this->hasMany(Staff::class);
    }
}
