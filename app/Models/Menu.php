<?php

namespace App\Models;

use App\Models\Category;
use App\Models\CuisineType;
use App\Models\OrderedMenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps=true;

    public function category(){
        return $this->belongsTo(Category::class, 'FK_categoryCode', 'PK_categoryCode');
    }

    public function cuisinetype(){
        return $this->belongsTo(CuisineType::class, "FK_cuisineCode", "PK_cuisineCode");
    }


    public function order(){
        return $this->belongsToMany(Order::class, 'ordered_menus', 'PK_FK_menuID', 'PK_FK_transactionID', 'PK_menuID', 'PK_transactionID');
    }

public function mostOrdered(){
    // return $this->hasOne();
}

public function ordersCount(){
    return $this->belongsToMany(Order::class, 'ordered_menus','PK_FK_menuID', 'PK_FK_transactionID', 'PK_menuID', 'PK_transactionID')
        ->selectRaw('count(ordered_menus.pk_fk_menuid) as aggregate')
        ->groupBy('pivot_pk_fk_menuid');
}
}

