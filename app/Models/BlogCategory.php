<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends EloquentModel
{
    use HasFactory;
    
    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
