<?php

namespace App\Arch\Domain\UseCases\App\Matter;

use App\Arch\Domain\Iterators\Response\BaseResponse;
use App\Arch\Domain\UseCases\BaseCases;
use App\Arch\Repositories\App\MatterRepository;


class CreateMatter extends BaseCases {
    protected MatterRepository $repository;

    public function __construct() {
        parent::__construct();
        $this -> repository = new MatterRepository();
    }

    public function create() : BaseResponse {
        $response = $this->repository->create([]);
    }

}
