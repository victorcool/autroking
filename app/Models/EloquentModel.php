<?php

namespace App\Models;

use App\Repositories\RepositoryInterface;
use App\Schematic\ModifierStamp;
use App\Utils\Eloquent\Traits\Exportable;
use App\Utils\Eloquent\Traits\ModelCache;
use App\Utils\Eloquent\Traits\SaveCreate;
use App\Utils\Eloquent\Traits\Searchable;
use App\Utils\Eloquent\Traits\Sortable;
use App\Utils\Eloquent\Traits\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EloquentModel extends Model
{
    use
    SoftDeletes;

public $guarded = ['id'];


    static function findById($id)
    {
        $record = self::findOrFail($id);
        return $record;
    }

    static function icreate(array $attributes)
    {
        $record = self::create($attributes);
        $record = $record->refresh();
        return $record;
    }

    static function iupdate($id, array $attributes)
    {
        $record = self::findById($id);

        foreach ($attributes as $key => $value) {
            $record->{$key} = $value;
        }

        $record->save();
        return $record->fresh();
    }
    static function idelete($id): bool
    {
        $deleted = self::destroy($id);
        return $deleted;
    }

    static function setQuery($query=null){
           return $query??new self;
    }
}
