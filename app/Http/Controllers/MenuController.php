<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class MenuController extends Controller
{
    public function fetchAll(){
        return Menu::all();
    }

    public function index(Request $request){
        return Menu::with('images')->get();
    }

    public function store(Request $request){
        $id = IdGenerator::generate(['table' => 'menus', 'field' => 'PK_menuID', 'length' => 10, 'prefix' => 'ME']);
        
        $menu = new Menu;
        $menu->PK_menuID = $id;
        $menu->menuName = $request->menuName;
        $menu->description = $request->description;
        $menu->price = $request->price;
        $menu->FK_categoryCode = $request->categoryCode;
        $menu->FK_cuisineCode = $request->cuisineCode;
        $menu->save();

        return response()->json([
            'menuList' => Menu::all(),
            'menuID' => $id
        ]);
    }
    
    public function update(Request $request){
        Menu::where('PK_menuID', $request->menuID)
            
        ->update([
        'menuName' => $request->menuName, 
        'description' => $request->description, 
        'price' => $request->price, 
        'FK_categoryCode' => $request->categoryCode, 
        'FK_cuisineCode' => $request->cuisineCode,
        ]);
           
        return Menu::all();
    }
    
    public function destroy($menuID){
        Menu::where('PK_menuID', $menuID)->delete();

        return Menu::all();
    }   
}
