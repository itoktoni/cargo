<?php

namespace Modules\Inventory\Http\Controllers;

use Plugin\Helper;
use Plugin\Response;
use App\Http\Controllers\Controller;
use App\Http\Services\MasterService;
use App\Http\Requests\GeneralRequest;
use Modules\Inventory\Dao\Repositories\BranchRepository;
use Modules\Inventory\Dao\Repositories\WarehouseRepository;

class WarehouseController extends Controller
{
    public $template;
    public static $model;

    public function __construct()
    {
        if (self::$model == null) {
            self::$model = new WarehouseRepository();
        }
        $this->template  = Helper::getTemplate(__CLASS__);
    }

    public function index()
    {
        return redirect()->route($this->getModule() . '_data');
    }

    private function share($data = [])
    {
        $branch = Helper::shareOption((new BranchRepository()));

        $view = [
            'key'      => self::$model->getKeyName(),
            'template' => $this->template,
            'branches' => $branch,
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
