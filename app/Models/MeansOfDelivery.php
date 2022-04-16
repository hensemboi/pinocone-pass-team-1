<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeansOfDelivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'PK_deliveryCode', 'deliveryName', 'description'
    ];

    public $timestamps = false;
}
