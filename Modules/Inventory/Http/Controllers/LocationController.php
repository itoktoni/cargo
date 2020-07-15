<?php

namespace Modules\Inventory\Http\Controllers;

use Plugin\Helper;
use Plugin\Response;
use App\Http\Controllers\Controller;
use App\Http\Services\MasterService;
use App\Http\Requests\GeneralRequest;
use Modules\Inventory\Dao\Repositories\LocationRepository;
use Modules\Inventory\Dao\Repositories\WarehouseRepository;

class LocationController extends Controller
{
    public $template;
    public static $model;

    public function __construct()
    {
        if (self::$model == null) {
            self::$model = new LocationRepository();
        }
        $this->template  = Helper::getTemplate(__CLASS__);
    }

    public function index()
    {
        return redirect()->route($this->getModule() . '_data');
    }

    private function share($data = [])
    {
        $warehouse = Helper::shareOption((new WarehouseRepository()));

        $view = [
            'key'      => self::$model->getKeyName(),
            'template' => $this->template,
            'warehouse' => $warehouse,
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
        $data = $service->show(self::$model, ['order', 'warehouse']);
        $datatable = Helper::listData(self::$model->datatable)->forget('inventory_warehouse_name');
        return view(Helper::setViewShow('location', 'inventory'))->with($this->share([
            'fields' => $datatable,
            'model'   => $data,
            'key'   => self::$model->getKeyName()
        ]));
    }
}
