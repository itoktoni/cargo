<?php

namespace Modules\Sales\Http\Controllers;

use Plugin\Helper;
use Plugin\Response;
use Maatwebsite\Excel\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Sales\Dao\Repositories\OrderRepository;
use Modules\Inventory\Dao\Repositories\BranchRepository;
use Modules\Sales\Dao\Repositories\report\ReportPenjualanRepository;

class ReportController extends Controller
{
    public $template;
    public $folder;
    public $excel;
    public static $model;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
        $this->template  = Helper::getTemplate(__CLASS__);
    }

    public function index()
    {
        return redirect()->route($this->getModule() . '_data');
    }

    private function share($data = [])
    {
        $branch = Helper::shareOption(new BranchRepository());
        $status = Helper::shareStatus((new OrderRepository())->status)->prepend('Pilih Semua Status', '');

        $user_branch = Auth::user()->branch;
        if (!empty($user_branch)) {
            $branch = [$user_branch => $branch[$user_branch]];
        }

        $view = [
            'branch' => $branch,
            'status' => $status,
            'template' => $this->template,
        ];

        return array_merge($view, $data);
    }

    public function penjualan()
    {
        if (request()->isMethod('POST')) {
            $name = 'report_sales_order_out_' . date('Y_m_d') . '.xlsx';
            return $this->excel->download(new ReportPenjualanRepository(), $name);
        }
        return view(Helper::setViewForm($this->template, __FUNCTION__, config('folder')))->with($this->share());
    }
}
