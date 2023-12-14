<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficePosition extends EloquentModel
{
    use HasFactory;

    public function aboutContent()
    {
        return $this->hasMany(OfficePosition::class);
    }
}
