<?php

namespace App\Models;

use App\Helpers\FileResolver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Image extends EloquentModel
{
    use HasFactory;
    public static function boot()
    {
        parent::boot();  

             
        static::updating(function ($model) 
        {            
            // if(Request::file()['images']??'')
            // {
            //     return $images = Image::where(['imageable_id'=>$model->id,'imageable_type'=>get_class($model)])->get();
            //     foreach ($images as $image) 
            //     {
            //         $subdirectory=str_replace('-',DIRECTORY_SEPARATOR,FileResolver::getInstance()->itemImg_subDir('about'));
            //         $path=public_path('uploads').DIRECTORY_SEPARATOR.($subdirectory?$subdirectory.DIRECTORY_SEPARATOR:'').$image->path;
            //         unlink($path); //uncomment this line out when testing on localhost
            //         //unlink(str_replace('kulprice/public','kulprice.com', $path)); //uncomment this out on production mode
            //         $image->forceDelete();
            //     }
            //     $images = Request::file()['images'];            
            //     FileResolver::getInstance()->saveImage(null,300,378,$images, $model->id, $model,null,'about');  
            // }

        });
        static::updated(function ($model){
            // dd($model);
            // if(Request::file()['images']??''){
            //     $images = Request::file()['images'];            
            //     FileResolver::getInstance()->saveImage(null,$images, $model->id, $model,null,'about'); 
            // }
        });

        self::deleting(function ($model) 
        {            
            $images = Image::where(['imageable_id'=>$model->id,'imageable_type'=>'App\\Models\\Blog'])->get();
            foreach ($images as $image) 
            {
                $subdirectory=str_replace('-',DIRECTORY_SEPARATOR,FileResolver::getInstance()->itemImg_subDir('about'));
                $path=public_path('uploads').DIRECTORY_SEPARATOR.($subdirectory?$subdirectory.DIRECTORY_SEPARATOR:'').$image->path;
                 unlink($path); //uncomment this line out when testing on localhost
                //unlink(str_replace('kulprice/public','kulprice.com', $path)); //uncomment this out on production mode
                $image->forceDelete();
            }
        });
    }
    public function imageable(){
        $this->morphTo();
    }
}
