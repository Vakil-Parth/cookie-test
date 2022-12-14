<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiFormRequest;

class BuyCookieRequest extends ApiFormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'number_of_cookie' => 'required|numeric|min:1'
        ];
    }
}
