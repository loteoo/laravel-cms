<?php

namespace App;

use Illuminate\Support\Facades\File;



class Cms {

    public static $modelNamespace = 'MagicResources';

    public static function getMagicResources() {
        return collect(File::allFiles(app_path(self::$modelNamespace)))->map(function ($absPath) {

            $class = substr('App' . str_replace(app_path(), '', $absPath), 0, -4);


            return $class;
        });
    }

    public static function getResourceClass($collection) {

        $resources = Cms::getMagicResources();

        $resource = $resources->filter(function ($resource) use ($collection) {
            return $resource::getCollectionName() == $collection;
        })->first();

        return $resource;
    }

}
