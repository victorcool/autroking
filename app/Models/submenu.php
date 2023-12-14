<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submenu extends Model
{
    use HasFactory;
    
    public function mainmenu()
    {
        return $this->belongsTo(mainmenu::class,'mainmenu_id');
    }
}
