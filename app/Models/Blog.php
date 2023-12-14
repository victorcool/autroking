<?php

namespace App\Models;

use App\Helpers\FileResolver;
use App\Http\Controllers\Admin\BlogCategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Blog extends EloquentModel
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();        

        static::created(function ($model) 
        {
            if(Request::file()['images']??''){                
                $images = Request::file()['images'];            
                FileResolver::getInstance()->saveBlogImage(null,$images, $model->id, $model);  
            }
           

        });

        static::creating(function ($model) 
        {
            $request = Request();
            $model->slug = generateUniqueSlug($model,$request->title);

        });

        static::updating(function ($model) 
        {            
            $request = Request();

            $post = Blog::find($request->id);
            
            $post->title = $request->title;

            if($post->isDirty('title'))
            {
                $model->slug = generateUniqueSlug($model,$request->title);
            }

        });

        self::deleting(function ($model) 
        {            
            $images = Image::where(['imageable_id'=>$model->id,'imageable_type'=>'App\\Models\\Blog'])->get();
            
            foreach ($images as $image) 
            {
                $subdirectory=str_replace('-',DIRECTORY_SEPARATOR,FileResolver::getInstance()->teamImg_subDir('blog_img'));
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

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }
}
