<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CuisineType;
use App\Models\Menu;
use Illuminate\Http\Request;

class CuisineController extends Controller
{
    public function fetchAll(){
        return CuisineType::All();
    }
}
