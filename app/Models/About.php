<?php

namespace App\Models;

use App\Helpers\FileResolver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class About extends EloquentModel
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();        

        static::creating(function ($model) 
        {
            $request = Request();
            $model->slug = generateUniqueSlug($model,$request->name);

        });

        static::created(function ($model) 
        {
            if(Request::file()['images']??''){
                $images = Request::file()['images'];            
                FileResolver::getInstance()->saveImage(null,$images, $model->id, $model,null,'about');  
            }
           
        });        

        static::updating(function ($model) 
        {            
            $request = Request();

            $post = About::find($request->id);
            
            $post->name = $request->name;

            if($post->isDirty('name'))
            {
                $model->slug = generateUniqueSlug($model,$request->name);
            }

        });

        static::updated(function ($model){
           
        });
        

        self::deleting(function ($model) 
        {            
            $images = Image::where(['imageable_id'=>$model->id,'imageable_type'=>'App\\Models\\About'])->get();
            foreach ($images as $image) 
            {
                $subdirectory=str_replace('-',DIRECTORY_SEPARATOR,FileResolver::getInstance()->itemImg_subDir('about'));
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

    public function aboutContent()
    {
        return $this->hasMany(AboutContent::class);
    }
}
