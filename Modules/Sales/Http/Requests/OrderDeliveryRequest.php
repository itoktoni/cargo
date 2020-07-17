<?php

namespace Modules\Sales\Http\Requests;

use App\Rules\Upload;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Modules\Sales\Dao\Repositories\OrderRepository;
use Illuminate\Http\Exceptions\HttpResponseException;
use Modules\Rajaongkir\Dao\Repositories\ProvinceRepository;

class OrderDeliveryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

     public function prepareForValidation()
    {
        $data = [];
        if (request()->post()) {

            $data['so_delivery_order'] = request()->get('code');
            $data['so_delivery_date'] = request()->get('so_delivery_date');
            $data['so_delivery_location'] = request()->get('so_delivery_location');
            $data['so_delivery_type'] = request()->get('so_delivery_type');
            $data['so_delivery_description'] = request()->get('so_delivery_description');
            $data['so_delivery_branch'] = Auth::user()->branch;
            $data['so_delivery_created_by'] = Auth::user()->username;
        }

        $this->merge([
            'data' => $data,
        ]);
    }

    public function rules()
    {
        if (request()->isMethod('POST')) {
            return [
                'sales_order_rajaongkir_from_area_id' => 'required',
                'sales_order_rajaongkir_from_name' => 'required',
                'sales_order_rajaongkir_to_area_id' => 'required',
                'sales_order_rajaongkir_to_name' => 'required',
                'sales_order_rajaongkir_to_address' => 'required',
                'sales_order_rajaongkir_rajaongkir_paket_id' => 'required',
                'sales_order_rajaongkir_finance_top_id' => 'required',
                'sales_order_rajaongkir_colli' => 'required|numeric',
                'so_delivery_date' => 'required',
                'so_delivery_description' => 'required',
            ];
        }
        return [];
    }
}
