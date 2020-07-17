<?php

namespace Modules\Sales\Http\Services;

use Plugin\Alert;
use Plugin\Helper;
use App\Http\Services\MasterService;
use App\Dao\Interfaces\MasterInterface;
use Modules\Finance\Dao\Models\Payment;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class OrderService extends MasterService
{
    public function save(MasterInterface $repository, $request)
    {
        $check = false;
        try {
            $check = $repository->saveRepository($request);
            Alert::create();
        } catch (\Throwable $th) {
            Alert::error($th->getMessage());
            return $th->getMessage();
        }

        return $check;
    }

    public function updateDelivery($model, $request)
    {
        $check = $model->create($request);
    }
}
