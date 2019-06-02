<?php

namespace App;

use App\Scopes\TypeScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MagicResource extends Model
{

    use SoftDeletes;

    protected $table = 'resources';

    public static function getClassName() {
        return class_basename(static::class);
    }

    public static function getResourceType() {
        return strtolower(static::getClassName());
    }

    public static function getCollectionName() {
        return self::getResourceType() . 's';
    }


    public static function boot() {

        parent::boot();

        static::addGlobalScope(new TypeScope);

        self::creating(function($model){
            $model->type = self::getResourceType();
        });

        // self::created(function($model){
        //     // ... code here
        // });

        // self::updating(function($model){
        //     // ... code here
        // });

        // self::updated(function($model){
        //     // ... code here
        // });

        // self::deleting(function($model){
        //     // ... code here
        // });

        // self::deleted(function($model){
        //     // ... code here
        // });
    }
}
