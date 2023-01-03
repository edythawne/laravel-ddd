<?php

namespace App\Arch\Domain\Iterators\Request\App;

use App\Arch\Domain\Iterators\Request\BaseRequest;
use App\Arch\Domain\Iterators\Response\BaseResponse;
use App\Arch\Domain\UseCases\App\Matter\CreateMatter;
use App\Arch\Domain\UseCases\App\Matter\GetMatter;

class MatterRequest extends BaseRequest {

    private GetMatter $caseGet;

    public function __construct() {

    }

    public function index() : BaseResponse {
        $this -> caseGet = new GetMatter();
        return $this -> caseGet -> getAll();
    }

    public function show(int $id) : BaseResponse {
        $this -> caseGet = new GetMatter();

        $this -> getRequest() -> merge(['id' => $id]);
        $this -> applyRules([ 'id' => 'required']);
        $this -> caseGet -> setAttributes($this->getParseRequest());

        return $this -> caseGet -> get();
    }

    public function create() : BaseResponse {
        $caseCreate = new CreateMatter();

        $this->applyRules([
            'area_id' => 'required|integer',
            'abbreviation' => 'required|string',
            'name' => 'required|string'
        ]);
        $caseCreate-> setAttributes($this->getParseRequest());

        return $caseCreate->create();
    }

}
