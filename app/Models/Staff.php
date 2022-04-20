<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;

    protected $guarded=[];

    public $timestamps=false;

    public function posix_getlogin(){
        return $this->belongsTo(Position::class);
    }

    public function staff(){
        return $this->belongsTo(Admin::class);
    }
}
