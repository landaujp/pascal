<?php

namespace App\Http\Responses\Error;

use App\Http\Responses\Error\Code;

class Message
{
    const MESSAGES = [
        Code::ERROR_VALIDATION => 'バリデーションエラーです。',
    ];

    public $code = null;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function getMessage()
    {
        return self::MESSAGES[$this->code];
    }
}
