<?php

namespace App\Http\Controllers\App;

use App\Arch\Domain\Iterators\Request\App\MatterRequest;
use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MatterController extends BaseController {

    protected MatterRequest $request;

    public function __construct() {
        $this->request = new MatterRequest();
    }

    public function index(Request $args) {
        $this->request->setRequest($args);
        $response = $this->request->index();
        return $this->getResponse($response);
    }

    public function show(Request $args, int $id) {
        $this->request->setRequest($args);
        $response = $this->request->show($id);
        return $this->getResponse($response);
    }

    /**
     * @param Request $args
     * @return JsonResponse
     */
    public function create(Request $args) {
        $this->request->setRequest($args);
        $response = $this->request->create();
        return $this->getResponse($response);
    }

}
