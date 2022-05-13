<?php

namespace App\Models;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $guarded=[];

    public $timestamps=false;

    public function staff(){
        return $this->belongsTo(Staff::class, "PK_FK_staffID", "PK_staffID");
    }
}
