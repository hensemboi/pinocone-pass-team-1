<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $primaryKey = 'PK_userID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'imageUrl'
    ];    

    public function menu(){
        return $this->belongsTo(Menu::class, 'FK_menuID', 'PK_menuID');
    }
}
