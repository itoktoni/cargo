<?php

namespace Modules\Sales\Http\Requests;

use App\Rules\Upload;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Modules\Sales\Dao\Repositories\OrderRepository;
use Modules\Rajaongkir\Dao\Repositories\ProvinceRepository;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        if (request()->isMethod('POST')) {
            return [
                'from' => 'required',
                'to' => 'required',
                'metode' => 'required|numeric',
            ];
        }
        return [];
    }
}
