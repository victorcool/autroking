<?php

namespace App\Helpers;

use App\Models\Image as AppImage;
use Image;
use Illuminate\Support\Facades\Log;

class FileResolver{

    private static $classInstance;

    public static function getInstance()
    {    
        if (self::$classInstance == null) 
        {
            self::$classInstance = new self();
        }
        return self::$classInstance;
    }

    static public function resolve($url,$subdirectory=null)
    {
        $subdirectory=str_replace('-',DIRECTORY_SEPARATOR,$subdirectory);
        $path=public_path('uploads').DIRECTORY_SEPARATOR.($subdirectory?$subdirectory.DIRECTORY_SEPARATOR:'').$url;
        Log::notice('photo',[$path]);
        return file_exists ($path)?$path:NULL;
    }

    // ====================For removing image from directory either by updating ================//
    static public function unlink($prevFile,$currentFile,$uploadDir)
    {
        if($prevFile!=$currentFile)
        {
            $prevFile=FileResolver::resolve($prevFile,$uploadDir);
            if($prevFile)
            {
                //unlink(str_replace('footballclub/public','kulprice.com', $prevFile)); //uncomment this out on production mode

                unlink($prevFile); //uncomment this on test mode
            }
        }
    }

    public function saveImage($imgId,$width,$height=null,$images, $itemId, $model, $prevFile=null, $dir=null)
    {        
        // loop through array of images
        
        foreach($images as $image)
        {  
            $modelx = get_class($model);
            
            $this->imageProcessor($imgId,$width,$height,$image,$itemId,$modelx,$prevFile,$dir);
        }          
        return $images;
    }   

    public function saveTeamImage($imgId,$images, $itemId, $model, $prevFile=null)
    {        
        // loop through array of images
        foreach($images as $image)
        {  
            $this->imageProcessor($imgId,500,null,$image,$itemId,get_class($model), $prevFile,$this->teamImg_subDir());
        }          
        return $images;
    }   

    public function saveBlogImage($imgId,$images, $itemId, $model,$prevFile=null)
    {        
        // loop through array of images
        foreach($images as $image)
        {  
            $this->imageProcessor($imgId,1200,null,$image,$itemId,get_class($model),$prevFile,$this->blogImg_subDir());
        }          
        return $images;
    }  

    public function saveProfileImage($imgId,$images, $itemId, $model,$prevFile=null)
    {        
        // loop through array of images
        foreach($images as $image)
        {  
            $this->imageProcessor($imgId,512,null,$image,$itemId,get_class($model),$prevFile,$this->profileImg_subDir());
        }          
        return $images;
    }   

    public function imageProcessor($imgId,$width,$height,$image,$itemId,$model, $prevFile,$dir = null)
    {
        $filenameWithExt = $image->getClientOriginalName();        
        //  Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get jus ext
        $extension = $image->getClientOriginalExtension();
        // File name to store
        $fileNameToStore = generateUniqueSlug($model,$filename).'_'.time().'.'.$extension;
        Image::make($image)->resize($width,$height,function ($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save('uploads'.DIRECTORY_SEPARATOR.$this->teamImg_subDir($dir).DIRECTORY_SEPARATOR.$fileNameToStore,100);
        
         // Push image to database
        $this->pushImagePathToDB($imgId,$filename,$fileNameToStore,$itemId,$model);
        
        if(!empty($prevFile))
        {
            $this->unlink($prevFile,$fileNameToStore,$this->teamImg_subDir($dir));
        }
    }

    public function teamImg_subDir($dir=null)
    {
        if($dir !== null)
            return $dir;
        else
            return 'team_images';
    }

    public function blogImg_subDir()
    {
        return 'blog_img';
    }

    public function profileImg_subDir()
    {
        return 'profile_images';
    }

    public function pushImagePathToDB($imgId,$filename,$fileNameToStore,$itemId,$model){
        return AppImage::updateOrCreate(
            ['id'=>$imgId],
            [
            'name' => $filename,
            'path' => $fileNameToStore,
            'imageable_id' => $itemId,
            'imageable_type' => $model 
            ]);
    }
}
