<?php

namespace App\Http\Controllers\Api;

use App\Cms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MagicResourceController extends Controller
{

    protected $model;

    public function __construct() {
        $this->model = static::getResourceClass();
    }

    public static function getResourceClass() {

        $collection = \Request::segment(2);
        $resources = Cms::getMagicResources();

        $resource = $resources->filter(function ($resource) use ($collection) {
            return $resource::getCollectionName() == $collection;
        })->first();

        return $resource;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->model::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->model::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->model::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->model::update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->model::destroy($id);
    }

    //TODO: delete forever
    //TODO: restore soft deleted
}
