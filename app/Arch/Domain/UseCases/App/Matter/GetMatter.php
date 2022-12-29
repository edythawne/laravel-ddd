<?php

namespace App\Arch\Domain\UseCases\App\Matter;

use App\Arch\Domain\Iterators\Response\BaseResponse;
use App\Arch\Domain\UseCases\BaseCases;
use App\Arch\Repositories\App\MatterRepository;

class GetMatter extends BaseCases {

    protected MatterRepository $repository;

    public function __construct() {
        parent::__construct();
        $this -> repository = new MatterRepository();
    }

    public function get() : BaseResponse {
        $id = $this -> getNumericValue('id');
        $response = $this -> repository -> get($id);
        return $this->setResponse('Test de Message', $response);
    }

    public function getAll() : BaseResponse {
        $response = $this->repository -> getAll();
        return $this->setResponse('Test de otra respuesta', $response);
    }

    public function create() {

    }

}
