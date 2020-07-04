<?php

namespace Modules\Rajaongkir\Http\Requests;

use Plugin\Helper;
use App\Rules\Upload;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Modules\Rajaongkir\Dao\Repositories\AreaRepository;
use Modules\Rajaongkir\Dao\Repositories\CityRepository;
use Modules\Rajaongkir\Dao\Repositories\ProvinceRepository;

class PriceCreateRequest extends FormRequest
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
            $from = request()->get('from');
            $area_from = AreaRepository::where('rajaongkir_area_city_id', $from)->get();
            
            $to = request()->get('to');
            $area_to = AreaRepository::where('rajaongkir_area_city_id', $to)->get();
            
            $price = request()->get('price');
            $packages = request()->get('packages');

            foreach ($packages as $package) {
                $paket = $package['paket'];
                foreach ($price as $prices) {
                    $harga = $prices['harga'];
                    $top = $prices['top'];

                    foreach ($area_from as $f) {
                        $dari = $f['rajaongkir_area_postcode'];
                    
                        foreach ($area_to as $t) {
                            $ke = $t['rajaongkir_area_postcode'];
                        
                            $data[] = [
                            'rajaongkir_price_code' => $dari.$ke.$paket.$top,
                            'rajaongkir_price_from' => $from,
                            'rajaongkir_price_to' => $to,
                            'rajaongkir_price_top' => $top,
                            'rajaongkir_price_paket' => $paket,
                            'rajaongkir_price_value' => Helper::filterInput($harga),
                        ];
                        }
                    }
                }
            }
        }
        
        $this->merge([
            'data' => $data,
        ]);
    }

    public function rules()
    {
        if (request()->isMethod('POST')) {
            return [
                'from'  => 'required',
                'to'      => 'required',
                'packages.*.paket' => 'required',
                'top.value.*' => 'required|min:4',
            ];
        }
        return [];
    }
}
