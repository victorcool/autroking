<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends EloquentModel
{
    use HasFactory;

    public function positionCategory()
    {
        return $this->belongsTo(PositionCategory::class,'position_category_id');
    }
    
    public function player()
    {
        return $this->hasMany(Player::class);
    }
}
