<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeansOfDelivery extends Model
{
    use HasFactory;

    protected $guarded =[];

    public $timestamps = false;

    public function order(){
        return $this->hasMany(Order::class, "FK_deliveryCode", "PK_deliveryCode");
    }
}
