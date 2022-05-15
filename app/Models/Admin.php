<?php

namespace App\Models;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guarded=[];

    protected $primaryKey = 'PK_FK_staffID';

    public $incrementing = false;

    public $timestamps=false;

    public function staff(){
        return $this->belongsTo(Staff::class);
    }
    
}
