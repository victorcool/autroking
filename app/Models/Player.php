<?php

namespace App\Models;

use App\Helpers\FileResolver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Player extends EloquentModel
{
    use HasFactory;
    public static function boot()
    {
        parent::boot();        

        static::created(function ($model) 
        {
            $request = Request();
            if(Request::file()){
                $images = Request::file()['images'];
                FileResolver::getInstance()->saveTeamImage(null,$images, $model->id, $model); 
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

            $post = Player::find($request->id);
            
            $post->name = $request->name;

            if($post->isDirty('name'))
            {
                $model->slug = generateUniqueSlug($model,$request->name);
            }

        });

        self::deleting(function ($model) 
        {            
            
            // $images = Image::where(['imageable_id'=>$model->id,'imageable_type'=>get_class($model)])->get();
                $image = $model->images;      

                $subdirectory=str_replace('-',DIRECTORY_SEPARATOR,FileResolver::getInstance()->teamImg_subDir('team_images'));
                $path=public_path('uploads').DIRECTORY_SEPARATOR.($subdirectory?$subdirectory.DIRECTORY_SEPARATOR:'').$image->path;                
                if (config('app.env') == 'local') {
                    unlink($path); //uncomment this line out when testing on localhost
                } else {
                    unlink(live_image_symlink($path)); //uncomment this out on production mode
                } 
                $image->forceDelete();
        });
    }

    public function teamCategory()
    {
        return $this->belongsTo(TeamCategory::class,'team_category_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class,'team_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class,'position_id');
    }

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
