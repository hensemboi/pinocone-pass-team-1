<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Ramsey\Uuid\Type\Integer;

class MenuController extends Controller
{


    public function index(){
        $menu = Menu::with('category')->get();
        dd($menu);
    }

    public function store(Request $request){
        $id = IdGenerator::generate(['table' => 'menus', 'field' => 'PK_menuID', 'length' => 10, 'prefix' => 'ME']);

        $menu = new Menu;
        $menu->PK_menuID = $id;
        $menu->menuName = $request->menuName;
        $menu->description = $request->description;
        $menu->price = $request->price;
        $menu->totalOrders = $request->totalOrders;
        $menu->FK_categoryCode = $request->categoryCode;
        $menu->FK_cuisineCode = $request->cuisineCode;
        $menu->save();

        return;
    }

    public function destroy(Request $request){
        Menu::where(
            [
                'PK_menuID' => $request->menuID
            ]
        )->delete();

        return;
    }

    public function show(){
        return;
    }


}
