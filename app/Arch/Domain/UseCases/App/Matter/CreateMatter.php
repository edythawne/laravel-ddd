<?php

namespace App\Arch\Domain\UseCases\App\Matter;

use App\Arch\Domain\Iterators\Builder\MatterTrait;
use App\Arch\Domain\Iterators\Response\BaseResponse;
use App\Arch\Domain\UseCases\BaseCases;
use App\Arch\Repositories\App\MatterRepository;


class CreateMatter extends BaseCases {
    use MatterTrait;
    protected MatterRepository $repository;

    public function __construct() {
        parent::__construct();
        $this -> repository = new MatterRepository();
    }

    public function create() : BaseResponse {
        $builder = $this->builderCreate($this->attributes);
        $response = $this->repository->create($builder);
        return $this->setResponse('Respuesta asi bien chida', $response);
    }

}
