<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class Response extends JsonResponse
{
    /**
     * Constructor.
     *
     * @param mixed $data
     * @param int   $status
     * @param array $headers
     * @param int   $options
     */
    public function __construct($data = null, $status = 200, $headers = [], $options = 0)
    {
        $request  = app()->request;
        $response = [
            self::INFO   => $request->input(self::INFO_HIDDEN, '---'),
            self::DATA   => $data,
            self::META   => [],
            self::RESULT => self::OK,
        ];

        parent::__construct($response, $status, $headers);
    }

    public static function success($data = [])
    {
        if (!is_array($data)) {
            $data = [$data];
        }

        $response = [
            'data' => $data,
        ];

        return Response::json($response, 200);
    }


    public static function error($error_code, $detail)
    {
        $response = [
            'error'  => [
                'code'   => $error_code,
                'title'  => Error_Message::get($error_code),
                'detail' => $detail,
            ]
        ];

        return Response::json($response, 400);
    }
}
