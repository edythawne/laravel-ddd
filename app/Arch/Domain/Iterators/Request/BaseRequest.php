<?php

namespace App\Arch\Domain\Iterators\Request;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as Validate;

class BaseRequest {

    protected Request $request;

    /**
     * @return Request
     */
    public function getRequest(): Request {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void {
        $this->request = $request;
    }

    public function getParseRequest() : array {
        return $this -> getRequest() -> all();
    }

    /**
     * Aplica reglas de validacion
     * @param array $rules
     * @return void
     */
    protected function applyRules(array $rules): void {
        $validator = Validator::make($this->getParseRequest(), $rules);
        $this->isValid($validator);
    }

    /**
     * Permite validar si el request es valido o tornara una excepción
     * @param Validate $validator
     * @return void
     */
    protected function isValid(Validate $validator): void {
        if ($validator->failed()) {
            throw new HttpResponseException(response()->json([]));
        }
    }
}
