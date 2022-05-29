<?php

namespace App\Core;

use App\Traits\ApiResponse;
use App\Traits\ManageRoles;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

/** @property CrudService $service */

class CrudController extends BaseController implements CrudInterfaz
{
    use ApiResponse, ManageRoles;

    protected $service;
    protected $object;
    public function __construct(CrudService $service)
    {
        $this->service = $service;
    }


    public function index(Request $request)
    {
        try{

            $this->object = $this->service->index($request);

            return custom_response(true,'Index',$this->object);
        }catch(Exception $e){
            return custom_error($e);
        }

    }

    public function show($id)
    {
        try{

            $this->object = $this->service->show($id);

            return custom_response(true,'show',$this->object);
        }catch(Exception $e){
            return custom_error($e);
        }
    }

    public function store(Request $request)
    {
        try{

            $this->object = $this->service->store($request);

            return custom_response(true,'show',$this->object);
        }catch(Exception $e){
            return custom_error($e);
        }
    }

    public function update($id, Request $request)
    {
        try{

            $this->object = $this->service->update($id, $request);

            return custom_response(true,'show',$this->object);
        }catch(Exception $e){
            return custom_error($e);
        }

    }

    public function destroy($id, Request $request)
    {
        try{

            $this->object = $this->service->destroy($id, $request);

            return custom_response(true,'show',$this->object);
        }catch(Exception $e){
            return custom_error($e);
        }
    }
}
