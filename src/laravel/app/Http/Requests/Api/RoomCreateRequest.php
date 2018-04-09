<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\BaseFormRequest;

class RoomCreateRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * リクエストされたパラメータと論理名のマッピング.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'チャットルームの名前',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha_dash_check|unique:rooms,name',
        ];
    }
}
