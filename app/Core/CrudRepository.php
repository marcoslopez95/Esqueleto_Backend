<?php
/**
 * Created by PhpStorm.
 * User: zippyttech
 * Date: 23/07/18
 * Time: 04:06 PM
 */

namespace App\Core;

use Illuminate\Http\Request;
class CrudRepository implements CrudInterfaz
{
    protected $model;
    protected $object;

    public function __construct(CrudModel $model = null)
    {
        $this->model = $model;
    }

    public function index(Request $request){
        $this->object = $this->model->all();

        return $this->object;
    }

    public function show($id){
        $this->object = $this->model->find($id);
        return $this->object;
    }

    public function store(Request $request){
        $this->object = $this->model->create($request->all());
        return $this->object;
    }

    public function update($id, Request $request){
        self::show($id);
        return $this->object->update($request->all());
    }

    public function destroy($id, Request $request){
        self::show($id);
        return $this->object->delete();
    }

}
