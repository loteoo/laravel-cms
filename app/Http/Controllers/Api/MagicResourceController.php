<?php

namespace App\Http\Controllers\Api;

use App\Cms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MagicResourceController extends Controller
{

    protected $class;

    public function __construct() {
        $this->class = Cms::getResourceClass(\Request::segment(2));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->class::all();

        foreach ($items as $item) {
            $item->fields;
        }

        return $items;
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
        // $model = new $this->class;
        // foreach ($request->all() as $key => $value) {
        //      $model->$key = $value;
        // }
        // $model->save();
        // return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->class::findOrFail($id);
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
        return $this->class::update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->class::destroy($id);
    }

    //TODO: delete forever
    //TODO: restore soft deleted
}
