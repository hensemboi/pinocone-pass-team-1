<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'PK_FK_userID', 'deviceNo', 'deviceOS', 'deviceName', 'webBrowser'
    ];
    
    public $timestamps = false;
}
