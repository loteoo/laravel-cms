<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MagicResource extends Model
{

    use SoftDeletes;

    protected $table = 'resources';

    public static function getResourceType() {
        $class = class_basename(static::class);
        return strtolower($class);
    }
}
