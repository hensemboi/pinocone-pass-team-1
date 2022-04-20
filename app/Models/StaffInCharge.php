<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffInCharge extends Model
{
    use HasFactory;

    protected $guarded=[];

    public $timestamps=false;

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function staff(){
        return $this->belongsTo(Staff::class);
    }
}
