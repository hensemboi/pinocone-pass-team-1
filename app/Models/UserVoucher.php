<?php

namespace App\Models;

use App\Models\User;
use App\Models\VoucherType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserVoucher extends Model
{
    use HasFactory;

    protected $guarded=[];

    public $timestamps=false;

    public function user(){
        return $this->belongsto(User::class);
    }
    
}
