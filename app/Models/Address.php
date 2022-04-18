<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'FK_userID', 'addressNo', 'customAddress', 'street', 'city', 'stater'
    ];
    
    public $timestamps = false;
}
