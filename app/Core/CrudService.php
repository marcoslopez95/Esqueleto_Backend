<?php
/**
 * Created by PhpStorm.
 * User: zippyttech
 * Date: 23/07/18
 * Time: 04:06 PM
 */

namespace App\Core;


use Carbon\Carbon;
use DomainException;
use Firebase\JWT\JWT;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/** @property CrudRepository $repository */
class CrudService implements CrudInterfaz
{

    protected $model;
    protected $object;
    protected $name = "item";
    protected $namePlural = "items";
    protected $paginate = false;
    protected $limit = null;
    protected $data = [];
    protected $request;
    protected $dato;
    protected $repository;

    public function __construct(CrudRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index(Request $request){
        return $this->repository->index($request);
    }

    public function show($id){
        return $this->repository->show($id);
    }

    public function store(Request $request){
        return $this->repository->store($request);
    }

    public function update($id, Request $request){
        return $this->repository->update($id,$request);
    }

    public function destroy($id, Request $request){
        return $this->repository->destroy($id,$request);
    }


}
