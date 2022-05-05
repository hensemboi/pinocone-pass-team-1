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
        return Menu::all();
    }

    public function store(){
        $id = IdGenerator::generate(['table' => 'menus', 'field' => 'PK_menuID', 'length' => 10, 'prefix' => 'ME']);
        
        $this ->validate(request(),[
            
            'menuName'=>'required',
            'description'=>'required',
            'price'=>'required',
            'categoryCode'=>'required',
            'cuisineCode'=>'required',
        ]);
            Menu::forceCreate([
            'menuName' => request('menuName'),
            'description' => request('description'),
            'price' => request('price'),
            'categoryCode' => request('categoryCode'),
            'cuisineCode' => request('cuisineCode'),
        ]);

        return ['success'=> 'Menu created successfully!'];
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
