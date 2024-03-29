<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Membership extends Model
{
    use HasFactory;

    protected $guarded =[];
    
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class, 'PK_FK_userID', 'PK_userID');
    }
}
