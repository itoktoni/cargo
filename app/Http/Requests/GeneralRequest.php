<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class GeneralRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function prepareForValidation()
    {

        $this->merge([
            // 'content' => ''
        ]);
    }

    public function rules()
    {
        return [];
    }
}
