<?php

namespace App\Models;

use App\Models\Order;
use App\Models\UserPaymentMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public $timestamps = false;

    public function userpaymentmethod(){
        return $this->hasMany(UserPaymentMethod::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
