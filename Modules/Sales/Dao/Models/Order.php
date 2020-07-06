<?php

namespace Modules\Sales\Dao\Models;

use App\User;
use Plugin\Helper;
use Modules\Sales\Dao\Models\Area;
use Modules\Sales\Dao\Models\City;
use Illuminate\Support\Facades\Auth;
use Modules\Crm\Dao\Models\Customer;
use Modules\Sales\Dao\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Modules\Finance\Dao\Models\Payment;
use Modules\Forwarder\Dao\Models\Vendor;
use Modules\Sales\Dao\Models\OrderDetail;
use Modules\Sales\Dao\Models\OrderDelivery;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Finance\Dao\Repositories\PaymentRepository;

class Order extends Model
{
    use SoftDeletes;
    protected $table = 'sales_order';
    protected $primaryKey = 'sales_order_id';
    public $detail_table = 'sales_order_detail';
    protected $fillable = [
    'sales_order_id',
    'sales_order_reff',
    'sales_order_email',
    'sales_order_delivery',
    'sales_order_invoice',
    'sales_order_date',
    'sales_order_prepare_date',
    'sales_order_delivery_date',
    'sales_order_marketing_promo_value',
    'sales_order_marketing_promo_description',
    'sales_order_total',
    'sales_order_invoice_date',
    'sales_order_attachment',
    'sales_order_description',
    'sales_order_status',
    'sales_order_updated_at',
    'sales_order_created_at',
    'sales_order_updated_by',
    'sales_order_created_by',
    'sales_order_core_user_id',
    'sales_order_deleted_at',
    'sales_order_rajaongkir_from_id',
    'sales_order_rajaongkir_from_name',
    'sales_order_rajaongkir_from_phone',
    'sales_order_rajaongkir_from_email',
    'sales_order_rajaongkir_from_area_id',
    'sales_order_rajaongkir_from_address',
    'sales_order_rajaongkir_to_id',
    'sales_order_rajaongkir_to_name',
    'sales_order_rajaongkir_to_phone',
    'sales_order_rajaongkir_to_email',
    'sales_order_rajaongkir_to_area_id',
    'sales_order_rajaongkir_to_address',
    'sales_order_rajaongkir_waybill',
    'sales_order_rajaongkir_weight',
    'sales_order_rajaongkir_colli',
    'sales_order_rajaongkir_cost_value',
    'sales_order_rajaongkir_cost_additional',
    'sales_order_rajaongkir_cost_total',
    'sales_order_rajaongkir_cost_description',
    'sales_order_rajaongkir_rajaongkir_paket_id',
    'sales_order_rajaongkir_finance_top_id',
    'sales_order_rajaongkir_category_id',
    'sales_order_rajaongkir_notes',
    'sales_order_inventory_branch_id',
    'sales_order_inventory_branch_area_id',
  ];

    public $timestamps = true;
    public $incrementing = false;
    public $rules = [
    'sales_order_email' => 'required',
  ];

    public $validate = true;

    public $prefix = 'SO';
    public $order = 'sales_order_date';

    public $with = ['detail'];

    const CREATED_AT = 'sales_order_created_at';
    const UPDATED_AT = 'sales_order_updated_at';
    const DELETED_AT = 'sales_order_deleted_at';

    public $searching = 'sales_order_id';
    public $datatable = [
    'sales_order_rajaongkir_waybill'                  => [true => 'No Resi'],
    'sales_order_date'                => [true => 'Order Date'],
    'sales_order_rajaongkir_to_name'     => [true => 'Nama Penerima'],
    'sales_order_marketing_promo_value'  => [false => 'Discount'],
    'finance_top_name'               => [true => 'Pembayaran'],
    'rajaongkir_paket_name'               => [true => 'Paket'],
    'sales_order_rajaongkir_colli'               => [false => 'Koli'],
    'sales_order_total'               => [false => 'Total'],
    'sales_order_status'              => [true => 'Status'],
    'sales_order_created_at'          => [false => 'Created At'],
    'sales_order_created_by'          => [false => 'Updated At'],
  ];

    protected $dates = [
    'sales_order_created_at',
    'sales_order_updated_at',
    'sales_order_prepare_date',
    'sales_order_delivery_date',
    'sales_order_invoice_date',
  ];

  public $status = [
    '1' => ['REGISTRASI', 'warning'],
    '2' => ['PERSIAPAN', 'primary'],
    '3' => ['PERNGIRIMAN', 'success'],
    '4' => ['SAMPAI TUJUAN', 'dark'],
    '0' => ['GAGAL', 'danger'],
  ];

    public $courier = [
    '' => 'Choose Expedition',
    'pos' => 'POS Indonesia (POS)',
    'jne' => 'Jalur Nugraha Ekakurir (JNE)',
    'tiki' => 'Citra Van Titipan Kilat (TIKI)',
    'rpx' => 'RPX Holding (RPX)',
    'wahana' => 'Wahana Prestasi Logistik (WAHANA)',
    'sicepat' => 'SiCepat Express (SICEPAT)',
    'jnt' => 'J&T Express (J&T)',
    'sap' => 'SAP Express (SAP)',
    'jet' => 'JET Express (JET)',
    'indah' => 'Indah Logistic (INDAH)',
    'ninja' => 'Ninja Express (NINJA)',
    'first' => 'First Logistics (FIRST)',
    'lion' => 'Lion Parcel (LION)',
    'rex' => 'Royal Express Indonesia (REX)',
  ];


    public function detail()
    {
        return $this->hasMany(OrderDetail::class, 'sales_order_detail_sales_order_id', 'sales_order_id');
    }

    public function delivery()
    {
        return $this->hasMany(OrderDelivery::class, 'so_delivery_order', 'sales_order_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'finance_payment_sales_order_id', 'sales_order_id');
    }

    public function customer()
    {
        return $this->hasOne(User::class, 'id', 'sales_order_core_user_id');
    }

    public function Province()
    {
        return $this->hasOne(Province::class, 'rajaongkir_province_id', 'sales_order_rajaongkir_province_id');
    }

    public function City()
    {
        return $this->hasOne(City::class, 'rajaongkir_city_id', 'sales_order_rajaongkir_city_id');
    }

    public function Area()
    {
        return $this->hasOne(Area::class, 'rajaongkir_area_id', 'sales_order_rajaongkir_area_id');
    }

    public static function boot()
    {
        parent::boot();
        parent::creating(function ($model) {
            if (Auth::check()) {
                $model->sales_order_created_by = auth()->user()->username;
                $model->sales_order_core_user_id = auth()->user()->id;
                $model->sales_order_email = auth()->user()->email;
            } else {
                $model->sales_order_created_by = 'no login';
            }

            if (!request()->has('sales_order_date')) {
                $model->sales_order_date = date('Y-m-d');
            }

            $model->sales_order_rajaongkir_waybill = 'R'.date('Y').\strtoupper(Helper::unic(5)).date('m');
            $model->sales_order_status = 1;
            $model->sales_order_id = Helper::autoNumber($model->getTable(), $model->getKeyName(), 'SO' . date('Ym'), config('website.autonumber'));
            
            if($model->sales_order_rajaongkir_finance_top_id == 1){

                $payment = [
                    'finance_payment_sales_order_id' => $model->sales_order_id,
                    'finance_payment_account_id' => 1,
                    'finance_payment_date' => date('Y-m-d'),
                    'finance_payment_person' => $model->sales_order_rajaongkir_from_name,
                    'finance_payment_amount' => $model->sales_order_total,
                    'finance_payment_notes' => $model->sales_order_description,
                    'finance_payment_status' => 3,
                    'finance_payment_created_by' => Auth::user()->username,
                    'finance_payment_created_at' => date('Y-m-d H:i:s'),
                    'finance_payment_updated_at' => date('Y-m-d H:i:s'),
                    'finance_payment_branch' => Auth::user()->branch,
                ];

                $mod = new PaymentRepository();
                $mod->saveRepository($payment);

            }

        });
    }

    public function scopeStatusCreate($query)
    {
        return $query->where('sales_order_status', 1);
    }
}
