<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'PK_FK_userID', 'PK_FK_paymentCode', 'cardNo', 'balance'
    ];
    
    public $timestamps = false;
}
