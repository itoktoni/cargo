<?php

namespace Modules\Sales\Http\Controllers;

use Plugin\Helper;
use Plugin\Response;
use App\Http\Controllers\Controller;
use App\Http\Services\MasterService;
use App\Http\Requests\GeneralRequest;
use Modules\Sales\Http\Requests\OrderRequest;
use Modules\Sales\Http\Services\OrderService;
use Modules\Rajaongkir\Http\Services\PriceService;
use Modules\Finance\Dao\Repositories\TopRepository;
use Modules\Crm\Dao\Repositories\CustomerRepository;
use Modules\Sales\Dao\Repositories\CategoryRepository;
use Modules\Marketing\Dao\Repositories\PromoRepository;
use Modules\Rajaongkir\Dao\Repositories\AreaRepository;
use Modules\Rajaongkir\Dao\Repositories\CityRepository;
use Modules\Rajaongkir\Dao\Repositories\PaketRepository;
use Modules\Rajaongkir\Dao\Repositories\PriceRepository;

class OrderController extends Controller
{
    public $template;
    public static $model;
    public $folder;

    public function __construct()
    {
        if (self::$model == null) {
            self::$model = new PriceRepository();
        }
        $this->template  = Helper::getTemplate(__CLASS__);
        $this->folder = 'rajaongkir';
    }

    public function index()
    {
        return redirect()->route($this->getModule() . '_data');
    }

    private function share($data = [])
    {
        $cities = Helper::shareOption((new CityRepository()), false, true, false);
        $area = Helper::shareOption((new AreaRepository()), false, true, false);
        $tops = Helper::shareOption((new TopRepository()), false);
        $promo = Helper::shareOption((new PromoRepository()));
        $customers = Helper::shareOption((new CustomerRepository()));
        $paket = Helper::shareOption((new PaketRepository()));
        $category = Helper::shareOption((new CategoryRepository()));
        $data_city = $cities->mapWithKeys(function ($item) {
            return [$item['rajaongkir_city_id'] => $item['rajaongkir_city_province_name'].' - '.$item['rajaongkir_city_name']];
        })->prepend('- Pilih Area Pengiriman -','');

        $data_area = $area->mapWithKeys(function ($item) {
            return [$item['rajaongkir_area_id'] => $item['rajaongkir_area_province_name'].' - '.$item['rajaongkir_area_city_name'].' - '.$item['rajaongkir_area_name'].' - '.$item['rajaongkir_area_postcode']];
        });

        
        $view = [
            'key'      => self::$model->getKeyName(),
            'template' => $this->template,
            'cities' => $data_city,
            'tops' => $tops,
            'paket' => $paket,
            'category' => $category,
            'promo' => $promo,
            'customers' => $customers,
            'area' => $data_area,
        ];

        return array_merge($view, $data);
    }

    public function create(OrderService $service, OrderRequest $request)
    {
        if (request()->isMethod('POST')) {
           
            $data = $service->save(self::$model, $request->all());
            return Response::redirectBack($data);
        }
        return view(Helper::setViewCreate())->with($this->share());
    }

    public function update(MasterService $service, GeneralRequest $request)
    {
        if (request()->isMethod('POST')) {
            $data = $service->update(self::$model, $request->all());
            return Response::redirectBack($data);
        }
        $data = $service->show(self::$model);
        return view(Helper::setViewUpdate($this->template, $this->folder))->with($this->share([
            'model'        => $data,
        ]));
    }

    public function delete(MasterService $service)
    {
        $service->delete(self::$model);
        return Response::redirectBack();
    }

    public function data(MasterService $service)
    {
        if (request()->isMethod('POST')) {
            $datatable = $service->datatable(self::$model);
            return $datatable->make(true);
        }

        return view(Helper::setViewData())->with([
            'fields'   => Helper::listData(self::$model->datatable),
            'template' => $this->template,
        ]);
    }

    public function show(MasterService $service)
    {
        $data = $service->show(self::$model);
        return view(Helper::setViewShow())->with($this->share([
            'fields' => Helper::listData(self::$model->datatable),
            'model'   => $data,
            'key'   => self::$model->getKeyName()
        ]));
    }
}
