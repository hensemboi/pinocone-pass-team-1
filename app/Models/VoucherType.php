<?php

namespace App\Models;

use App\Models\Voucher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VoucherType extends Model
{    use HasFactory;

    protected $guarded=[];

    public $timestamps=false;

    public function voucher(){
        return $this->hasMany(Voucher::class);
    }
}
