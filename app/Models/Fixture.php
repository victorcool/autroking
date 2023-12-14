<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends EloquentModel
{
    use HasFactory;

    public function home_club()
    {
        return $this->belongsTo(Club::class,'home_team');
    }

    public function away_club()
    {
        return $this->belongsTo(Club::class,'away_team');
    }
}
