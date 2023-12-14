<?php

namespace App\Models;

use App\Helpers\FileResolver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Club extends EloquentModel
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();        

        static::created(function ($model) 
        {
            $images = Request::file()['images'];            
            FileResolver::getInstance()->saveImage(null,262,268,$images, $model->id, $model,null,'club'); 
        });

        static::creating(function ($model) 
        {
            // $request = Request();
            // $model->slug = generateUniqueSlug($model,$request->title);

        });

        static::updating(function ($model) 
        {            
            $request = Request();

            $post = Club::find($request->id);
            
            $post->name = $request->name;

            if($post->isDirty('name'))
            {
                $model->slug = generateUniqueSlug($model,$request->name);
            }

        });

        self::deleting(function ($model) 
        {            
            $images = Image::where(['imageable_id'=>$model->id,'imageable_type'=>'App\\Models\\Club'])->get();
            foreach ($images as $image) 
            {
                $subdirectory=str_replace('-',DIRECTORY_SEPARATOR,FileResolver::getInstance()->teamImg_subDir('club'));
                $path=public_path('uploads').DIRECTORY_SEPARATOR.($subdirectory?$subdirectory.DIRECTORY_SEPARATOR:'').$image->path;
                if (config('app.env') == 'local') {
                    unlink($path); //uncomment this line out when testing on localhost
                } else {
                    unlink(live_image_symlink($path)); //uncomment this out on production mode
                } 
                $image->forceDelete();
            }
        });
    }
    
    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

   
}
