<?php

namespace App\Arch\Domain\UseCases;

use App\Arch\Constants\Constants;
use App\Arch\Domain\Iterators\Response\BaseResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

abstract class BaseCases {

    protected array $attributes;
    private BaseResponse $resource;

    public function __construct() {
        $this->resource = new BaseResponse();
    }

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes): void {
        $this->attributes = $attributes;
    }

    /**
     * Retorna la respuesta
     * @param string $message
     * @param mixed $data
     * @return BaseResponse
     */
    protected function setResponse(string $message, mixed $data) : BaseResponse{
        $this -> resource -> setData($data);
        $this -> resource -> setMessage($message);
        return $this->resource;
    }

    /**
     * Obtiene un valor numerico
     * @param string $key
     * @return int
     */
    protected function getNumericValue(string $key) : int {
        return Arr::get($this->attributes, $key, Constants::DEFAULT_NUMERIC);
    }

    /**
     * Obtiene un valor string
     * @param string $key
     * @return string
     */
    protected function getStringValue(string $key) : string {
        return Arr::get($this->attributes, $key, Constants::DEFAULT_STRING);
    }

    /**
     * Obtiene un valor array
     * @param string $key
     * @return Collection
     */
    protected function getArrayValue(string $key) : Collection {
        return collect(Arr::get($this->attributes, $key));
    }

}
