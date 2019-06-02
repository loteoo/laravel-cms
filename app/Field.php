<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function resource() {
        return $this->belongsTo('App\MagicResource', 'resource_id');
    }
}
