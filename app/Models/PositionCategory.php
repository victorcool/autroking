<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionCategory extends EloquentModel
{
    use HasFactory;

    public function position()
    {
        return $this->hasMany(Position::class);
    }
}
