<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mainmenu extends Model
{
    use HasFactory;

    public function submenu()
    {
        return $this->hasMany(submenu::class);
    }
    
}
