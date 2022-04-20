<?php

namespace App\Models;

use App\Models\Order;
use App\Models\UserVoucher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    use HasFactory;

    protected $guarded=[];

    public $timestamps=false;

    public function uservoucher(){
        return $this->hasMany(UserVoucher::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function vouchertype(){
        return $this->belongsto(VoucherType::class);
    }
}
