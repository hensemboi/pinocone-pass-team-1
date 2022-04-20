<?php

namespace App\Models;

use App\Models\User;
use App\Models\Voucher;
use App\Models\Feedback;
use App\Models\OrderedMenu;
use App\Models\PaymentMethod;
use App\Models\StaffInCharge;
use App\Models\MeansOfDelivery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderedmenu(){
        return $this->hasMany(OrderedMenu::class);
    }

    public function meansofdelivery(){
        return $this->belongsTo(MeansOfDelivery::class);
    }

    public function paymentmethod(){
        return $this->belongsTo(PaymentMethod::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function voucher(){
        return $this->hasMany(Voucher::class);
    }

    public function feedback(){
        return $this->belongsTo(Feedback::class);
    }

    public function staffincharge(){
        return $this->hasMany(StaffInCharge::class);
    }
}
