<?php

namespace App\Http\Requests\Api;

use App\Http\Responses\ErrorResponse;
use App\Http\Responses\Error\Code;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class BaseFormRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            new ErrorResponse(Code::ERROR_VALIDATION, $validator->errors())
        );
    }
}
