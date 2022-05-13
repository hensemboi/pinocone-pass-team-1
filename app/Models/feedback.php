<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "feedbacks";

    public function user(){
        return $this->belongsTo(User::class, "PK_FK_userID", "PK_userID");
    }

    public function order(){
        return $this->belongsTo(Order::class, "PK_FK_transactionID", "PK_transactionID")
    }
}