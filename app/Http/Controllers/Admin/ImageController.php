<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileResolver;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    private $model = 'App\Models\Item';

    public function update_about_image(Request $request)
    {
        $rules = [
            'images'=> 'required|max:2048',             
        ];        
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) 
        {
            return back()->withErrors($validator);
        }
        if($request->model) 
        {
            $this->model = $request->model;
        }
        if($request->item_id)
        {
            $images = $request->file()['images'];
            $itemId = $request->item_id;
            $model = $this->model::find($itemId);
            if(!empty($images))
            {
                FileResolver::getInstance()->saveItemImage(null,$images,$itemId,$model); 
    
                return back()->with('success','image updated successfully');
            }
        }
        else{

            $img = Image::whereId([$request->id])->first();
            $prevFile = $img->path??'';
            $images = $request->file()['images'];
            $itemId = $img->imageable_id;
            $model = $this->model::find($itemId);
            if(!empty($images))
            {
                FileResolver::getInstance()->saveItemImage($request->id,$images,$itemId,$model,$prevFile); 

                return back()->with('success','image updated successfully');
            }
        }
    }
}
