<?php

namespace Modules\Sales\Http\Controllers;

use Plugin\Helper;
use Plugin\Response;
use App\Http\Controllers\Controller;
use App\Http\Services\MasterService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GeneralRequest;
use Modules\Sales\Dao\Models\OrderDelivery;
use Modules\Sales\Http\Requests\OrderRequest;
use Modules\Sales\Http\Services\OrderService;
use Modules\Item\Dao\Repositories\BrandRepository;
use Modules\Finance\Dao\Repositories\TopRepository;
use Modules\Sales\Dao\Repositories\OrderRepository;
use Modules\Crm\Dao\Repositories\CustomerRepository;
use Modules\Sales\Http\Requests\OrderDeliveryRequest;
use Modules\Sales\Dao\Repositories\CategoryRepository;
use Modules\Finance\Dao\Repositories\PaymentRepository;
use Modules\Marketing\Dao\Repositories\PromoRepository;
use Modules\Rajaongkir\Dao\Repositories\AreaRepository;
use Modules\Rajaongkir\Dao\Repositories\CityRepository;
use Modules\Inventory\Dao\Repositories\BranchRepository;
use Modules\Rajaongkir\Dao\Repositories\PaketRepository;
use Modules\Inventory\Dao\Repositories\LocationRepository;

class OrderController extends Controller
{
    public $template;
    public static $model;
    public $folder;

    public function __construct()
    {
        if (self::$model == null) {
            self::$model = new OrderRepository();
        }
        $this->template  = Helper::getTemplate(__CLASS__);
        $this->folder = 'sales';
    }

    public function index()
    {
        return redirect()->route($this->getModule() . '_data');
    }

    private function share($data = [])
    {
        $tops = Helper::shareOption((new TopRepository()), false);
        $promo = Helper::shareOption((new PromoRepository()));
        $customers = Helper::shareOption((new CustomerRepository()));
        $paket = Helper::shareOption((new PaketRepository()));
        $category = Helper::shareOption((new CategoryRepository()));
        $status = Helper::shareStatus(self::$model->status);
        $category = Helper::shareOption((new CategoryRepository()));

        $area = Helper::shareOption((new AreaRepository()), false, true, false);
        $data_area = $area->mapWithKeys(function ($item) {
            return [$item['rajaongkir_area_id'] => $item['rajaongkir_area_province_name'].' - '.$item['rajaongkir_area_city_name'].' - '.$item['rajaongkir_area_name'].' - '.$item['rajaongkir_area_postcode']];
        })->prepend('- Pilih Salah Satu -', '');
        
        $branch = BranchRepository::find(Auth::user()->branch);
        $branch_area_id = $branch->inventory_branch_area_id ?? null;
        $branch_user = [$branch->inventory_branch_id => $branch->inventory_branch_name];
        $branch_area = [Auth::user()->area => $data_area[$branch_area_id]];
        
        $view = [
            'key'      => self::$model->getKeyName(),
            'template' => $this->template,
            'tops' => $tops,
            'paket' => $paket,
            'category' => $category,
            'status' => $status,
            'promo' => $promo,
            'branch' => $branch_user,
            'branch_area' => $branch_area,
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

    public function update(OrderService $service, OrderDeliveryRequest $request)
    {
        if (request()->isMethod('POST')) {
            $data = $service->update(self::$model, $request->all());
            $delivery = $request->get('data');
            $data = $service->updateDelivery((new OrderDelivery()), $delivery);

            return Response::redirectBack($data);
        }

        $data = $service->show(self::$model);
        $model_delivery = new OrderDelivery();
        $delivery = Helper::shareStatus($model_delivery->status);
        $location = Helper::shareOption((new LocationRepository()), false, true,false);

        $loc = $location->mapWithKeys(function ($item) {
            return [$item['inventory_location_id'] => $item['inventory_warehouse_name'].' - '.$item['inventory_location_name']];
        })->prepend('- Pilih Salah Satu -', '');

        return view(Helper::setViewUpdate($this->template, $this->folder))->with($this->share([
            'model'        => $data,
            'delivery'        => $delivery,
            'location'        => $loc,
        ]));
    }

    public function delete(MasterService $service)
    {
        if(request()->has('code') && request()->has('detail')){
                
            $code = request()->get('code');
            $detail = request()->get('detail');

            $delete = OrderDelivery::where('so_delivery_id', $detail)->delete();
            return redirect()->back();
        }

        $service->delete(self::$model);
        return Response::redirectBack();
    }

    public function data(MasterService $service)
    {
        if (request()->isMethod('POST')) {
            $datatable = $service->setRaw(['sales_order_status'])->datatable(self::$model);
            $datatable->editColumn('sales_order_status', function ($select) {
                return Helper::createStatus([
                    'value'  => $select->sales_order_status,
                    'status' => self::$model->status,
                ]);
            });

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
        $field = Helper::listData(self::$model->datatable);
        unset($field['sales_order_status']);
        unset($field['rajaongkir_paket_name']);
        unset($field['finance_top_name']);
        $delivery = OrderDelivery::where('so_delivery_order', $data->sales_order_id)->get();
        $payment = PaymentRepository::where('finance_payment_sales_order_id', $data->sales_order_id)->get();
        return view(Helper::setViewShow($this->template, $this->folder))->with($this->share([
            'fields' => $field,
            'payment'   => $payment,
            'model'   => $data,
            'delivery'   => $delivery,
            'key'   => self::$model->getKeyName()
        ]));
    }
}
