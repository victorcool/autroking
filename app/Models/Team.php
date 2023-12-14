<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends EloquentModel
{
    use HasFactory;

    public function teamCategory()
    {
        return $this->belongsTo(TeamCategory::class,'team_category_id');
    }

    public function player()
    {
        return $this->hasMany(Player::class);
    }
}
