<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;


    protected $table = 'staffs';

    protected $guarded=[];

    public $timestamps=true;

    public function positioon(){
        return $this->belongsTo(Position::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
