<?php

namespace App;

use App\Scopes\TypeScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class MagicResource extends Model
{

    use SoftDeletes;

    protected $table = 'resources';


    // public function setAttribute($key, $value) {

    //     if ($value && in_array($this->structure, $key)) {
    //         $this->
    //     }

    //     // Handover the rest to Laravel's own setAttribute(), so that other
    //     // mutators will remain intact...
    //     return parent::setAttribute($key, $value);
    // }

    public static function getClassName() {
        return class_basename(static::class);
    }

    public static function getResourceType() {
        return strtolower(static::getClassName());
    }

    public static function getCollectionName() {
        return static::getResourceType() . 's';
    }



    public static function boot() {

        parent::boot();

        static::addGlobalScope('type', function (Builder $builder) {
            $builder->where('type', static::getResourceType());
        });

        self::creating(function($model) {
            $model->type = static::getResourceType();
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



    public function fields() {
        return $this->hasMany('App\Field', 'resource_id');
    }

}
