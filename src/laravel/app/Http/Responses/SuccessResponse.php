<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class SuccessResponse extends JsonResponse
{
    public function __construct($data = null, $headers = [], $options = 0)
    {
        parent::__construct(['data' => $data], 200, $headers, $options);
    }
}
