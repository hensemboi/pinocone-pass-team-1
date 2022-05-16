<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ImageController extends Controller
{
    public function upload(Request $request, $menuID) {  
        foreach ($request->images as $image) {
            $imageUpload = new Image;

            $id = IdGenerator::generate(['table' => 'images', 'field' => 'PK_imageID', 'length' => 10, 'prefix' => 'IM']);
            $file_name = $image->getClientOriginalName();
            $file_path = $image->storeAs('images', $file_name);

            $imageUpload->PK_imageID = $id;
            $imageUpload->FK_menuID = $menuID;
            $imageUpload->imageUrl = "/".$file_path;
            $imageUpload->save();
        }

        return;
    }

    public function fetchImage($id){
        $modalImages = Image::select('imageUrl')->where('FK_menuID', $id)->get();
        
        return $modalImages;
    }
}
