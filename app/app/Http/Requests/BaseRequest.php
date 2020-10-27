<?php
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Route;

class BaseRequest extends FormRequest
{
    protected $returnData;
    public function __construct(array $query = array(),array $request = array(),array $attributes = array(),array $cookies = array(),array $files = array(),array $server = array(),$content = null)
    {
        parent::__construct($query,$request,$attributes,$cookies,$files,$server,$content);
        $this->returnData = array("HTTPStatus"=>Response::HTTP_UNPROCESSABLE_ENTITY,"executed"=>false,"message"=>"Falha na validação de campos","validator"=>new \stdClass,"object"=>new \stdClass);

    }
    protected function requestReturn(Validator $validator)
    {
        $this->returnData['validator']  = $validator->errors();
        return new JsonResponse($this->returnData, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->requestReturn($validator));
    }

}