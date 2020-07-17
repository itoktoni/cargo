<?php

use App\User;
use Plugin\Helper;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Modules\Item\Dao\Repositories\StockRepository;
use Modules\Crm\Dao\Repositories\CustomerRepository;
use Modules\Marketing\Dao\Repositories\PromoRepository;
use Modules\Rajaongkir\Dao\Repositories\PriceRepository;

// use Helper;
// use Curl;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
//
if (Cache::has('routing')) {
    $cache_query = Cache::get('routing');
    Route::middleware(['auth:api'])->group(function () use ($cache_query) {
        foreach ($cache_query as $route) {
            Route::post($route->action_module, $route->action_path . '@data')->name($route->action_module . '_api');
        }
    });
}

Route::match(
    [
        'GET',
        'POST'
    ],
    'customer_api',
    function () {
        $input = request()->get('id');
        $query = false;
        if ($input) {
            $query = CustomerRepository::find($input);
            return $query->toArray();
        }
        return $query;
    }
)->name('customer_api');

Route::match(
    [
        'GET',
        'POST'
    ],
    'ongkir_api',
    function () {
        $from = request()->get('from');
        $to = request()->get('to');
        $koli = request()->get('koli');
        $paket = request()->get('paket');
        $top = request()->get('top');

        $price = false;
        
        if ($from && $to && $koli && $paket && !empty($top)) {
            $query = new PriceRepository();
            $get = $query->where('rajaongkir_price_from', $from)
            ->where('rajaongkir_price_to', $to)
            ->where('rajaongkir_price_top', $top)
            ->where('rajaongkir_price_paket', $paket)->first();
            if ($get) {
                $price = $koli * $get->rajaongkir_price_value;
            }
        }

        return response()->json([$price]);
    }
)->name('ongkir_api');

Route::match(
    [
        'GET',
        'POST'
    ],
    'discount_api',
    function () {
        $cost = request()->get('cost');
        $discount = request()->get('discount');
        
        $total = false;
        
        if ($cost && $discount) {
            $query = new PromoRepository();
            $get = $query->where('marketing_promo_id', $discount)->first();
            if ($get) {
                
                $matrix = $get->marketing_promo_matrix;
                $string = str_replace('@value', $cost, $matrix);
                
                try {
                    $total = Helper::calculate($string);
                } catch (\Throwable $th) {
                    $total = $cost;
                }

            }
        }

        return response()->json([$total]);
    }
)->name('discount_api');


Route::post('team_testing', 'TeamController@data')->middleware('jwt');
Route::post('team_testing2', 'TeamController@data')->middleware('auth:airlock');

Route::post('register_api', 'APIController@register');
Route::post('login_api', 'APIController@login');
Route::post('air_login', 'APIController@airLogin');
