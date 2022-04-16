<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'FK_userID', 'startDate', 'expiryDate', 'active'
    ];
    
    public $timestamps = false;
}
