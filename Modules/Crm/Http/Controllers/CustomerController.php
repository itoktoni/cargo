<?php

namespace Modules\Crm\Http\Controllers;

use Plugin\Helper;
use Plugin\Response;
use App\Http\Controllers\Controller;
use App\Http\Services\MasterService;
use App\Http\Requests\GeneralRequest;
use Modules\Crm\Dao\Repositories\CategoryRepository;
use Modules\Crm\Dao\Repositories\CustomerRepository;
use Modules\Rajaongkir\Dao\Repositories\AreaRepository;

class CustomerController extends Controller
{
    public $template;
    public static $model;

    public function __construct()
    {
        if (self::$model == null) {
            self::$model = new CustomerRepository();
        }
        $this->template  = Helper::getTemplate(__CLASS__);
    }

    public function index()
    {
        return redirect()->route($this->getModule() . '_data');
    }

    private function share($data = [])
    {
        $category = Helper::shareOption((new CategoryRepository()));
        $area = Helper::shareOption((new AreaRepository()), false, true, false);
        $data_area = $area->mapWithKeys(function ($item) {
            return [$item['rajaongkir_area_id'] => $item['rajaongkir_area_province_name'].' - '.$item['rajaongkir_area_city_name'].' - '.$item['rajaongkir_area_name'].' - '.$item['rajaongkir_area_postcode']];
        });

        $view = [
            'key'      => self::$model->getKeyName(),
            'template' => $this->template,
            'categories' => $category,
            'area' => $data_area
        ];

        return array_merge($view, $data);
    }

    public function create(MasterService $service, GeneralRequest $request)
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
        return view(Helper::setViewUpdate())->with($this->share([
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
