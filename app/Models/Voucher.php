<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'PK_voucherID', 'name', 'startDate', 'expiryDate', 'duration', 'availability', 'membership', 'FK_voucherTypeCode'
    ];
    
    public $timestamps = false;
}
