<?php

namespace Modules\Finance\Dao\Models;

use Plugin\Helper;
use Modules\Sales\Dao\Models\Order;
use Illuminate\Support\Facades\Auth;
use Modules\Finance\Dao\Models\Bank;
use Illuminate\Database\Eloquent\Model;
use Modules\Finance\Dao\Models\Account;
use Modules\Inventory\Dao\Models\Branch;
use Modules\Sales\Dao\Repositories\OrderRepository;
use Modules\Procurement\Dao\Repositories\PurchaseRepository;

class Payment extends Model
{
  protected $table = 'finance_payment';
  protected $primaryKey = 'finance_payment_id';
  protected $fillable = [
    'finance_payment_id',
    'finance_payment_sales_order_id',
    'finance_payment_reference',
    'finance_payment_account_id',
    'finance_payment_date',
    'finance_payment_person',
    'finance_payment_amount',
    'finance_payment_attachment',
    'finance_payment_notes',
    'finance_payment_status',
    'finance_payment_created_by',
    'finance_payment_created_at',
    'finance_payment_updated_at',
    'finance_payment_updated_by',
    'finance_payment_voucher',
    'finance_payment_branch',
  ];

  public $with = ['account'];
  public $timestamps = true;
  public $incrementing = true;
  public $rules = [
    'finance_payment_approve_amount' => 'required',
    'finance_payment_person' => 'required',
    'finance_payment_date' => 'required',
    'finance_payment_to' => 'required',
  ];

  const CREATED_AT = 'finance_payment_created_at';
  const UPDATED_AT = 'finance_payment_updated_at';

  public $searching = 'finance_payment_person';
  public $datatable = [
    'finance_payment_id'             => [false => 'ID'],
    'finance_payment_voucher'           => [true => 'Voucher'],
    'finance_payment_sales_order_id'         => [true => 'Order No'],
    'finance_payment_reference'         => [false => 'Reference'],
    'finance_payment_account_id'         => [true => 'Account'],
    'finance_payment_amount'  => [true => 'Amount'],
    'finance_payment_status'  => [true => 'Status'],
    'finance_payment_notes' => [true => 'Catatan'],
    'finance_payment_branch' => [false => 'Branch'],
    'finance_payment_created_at'     => [false => 'Created At'],
    'finance_payment_created_by'     => [false => 'Updated At'],
  ];

  protected $dates = [
    'finance_payment_created_at',
    'finance_payment_updated_at',
    // 'finance_payment_date',
    'finance_payment_approved_at',
  ];

  public $status = [
    '0' => ['HUTANG', 'danger'],
    '1' => ['KREDIT', 'warning'],
    '2' => ['LUNAS', 'success'],
  ];

  public function account()
  {
    return $this->hasOne(Account::class, 'finance_account_id', 'finance_payment_account_id');
  }

  public function branch()
  {
    return $this->hasOne(Branch::class, 'inventory_branch_id', 'finance_payment_branch');
  }

  public function order()
  {
    return $this->hasOne(Order::class, 'sales_order_id', 'finance_payment_sales_order_id');
  }

  public static function boot()
  {
    parent::boot();
    parent::saving(function ($model) {
      if (request()->has('finance_payment_description')) {
        $model->finance_payment_approved_by = auth()->user()->username;
        $model->finance_payment_approved_at = date('Y-m-d H:i:s');
      }

      $file = request()->file('files');
      if (!empty($file)) //handle images
      {
        $name = Helper::uploadFile($file, Helper::getTemplate(__CLASS__));
        $model->finance_payment_attachment = $name;
      }

      $model->finance_payment_amount = Helper::filterInput($model->finance_payment_amount);

      if (Auth::check()) {
        $model->finance_payment_updated_by = auth()->user()->username;
      }

    });

    parent::creating(function ($model) {

      $file = request()->file('files');
      if (!empty($file)) //handle images
      {
        $name = Helper::uploadFile($file, Helper::getTemplate(__CLASS__));
        $model->finance_payment_attachment = $name;
      }

      if ($model->finance_payment_sales_order_id) {
        $model->finance_payment_created_by = Auth::user()->username;
      }

      $model->finance_payment_voucher = Helper::autoNumber($model->getTable(), 'finance_payment_voucher', 'VC' . date('Ym'), 13);
    });
  }
}
