<?php

namespace App\Http\Controllers;

use App\Arch\Domain\Iterators\Response\BaseResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller  {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Construye json respuesta al front
     * @param BaseResponse $resource
     * @return JsonResponse
     */
    protected function getResponse(BaseResponse $resource) {
        $data = $resource -> getData();
        $msg = $resource -> getMessage();

        $response = ['data' => $data, 'message' => $msg];

        if (!isset($data)) {
            return response()->json($response, Response::HTTP_ACCEPTED);
        }

        return response()->json($response);
    }

}
