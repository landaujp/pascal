<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use App\Http\Responses\Error\Message;

class ErrorResponse extends JsonResponse
{
    /**
     * Constructor.
     *
     * @param mixed $data
     * @param int   $status
     * @param array $headers
     * @param int   $options
     */
    public function __construct($error_code, $detail, $headers = [], $options = 0)
    {
        $message = new Message($error_code);
        $response = [
            'error'  => [
                'code'   => $error_code,
                'title'  => $message->getMessage(),
                'detail' => $detail,
            ],
        ];

        parent::__construct($response, 400, $headers, $options);
    }
}
