<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderedMenu extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function order(){
        return $this->belongsTo(Order::class,'PK_FK_transactionID', 'PK_transactionID');
    }

    public function menu(){
        return $this->belongsTo(Menu::class, 'PK_FK_menuID', 'PK_menuID');
    }
}
