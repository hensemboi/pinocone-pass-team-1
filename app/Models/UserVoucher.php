<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVoucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'PK_FK_userID', 'PK_FK_voucherID'
    ];
    
    public $timestamps = false;
}
