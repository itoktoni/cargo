<?php

namespace Modules\Sales\Dao\Models;

use Modules\Item\Dao\Models\Color;
use Modules\Item\Dao\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Modules\Inventory\Dao\Models\Branch;
use Modules\Inventory\Dao\Models\Location;

class OrderDelivery extends Model
{
  protected $table = 'sales_order_delivery';
  protected $primaryKey = 'so_delivery_id';
  protected $with = ['branch'];
  protected $fillable = [
    'so_delivery_id',
    'so_delivery_order',
    'so_delivery_branch',
    'so_delivery_date',
    'so_delivery_created_at',
    'so_delivery_updated_at',
    'so_delivery_created_by',
    'so_delivery_description',
    'so_delivery_type',
    'so_delivery_location',
  ];

  public $timestamps = true;
  public $incrementing = true;

  const CREATED_AT = 'so_delivery_created_at';
  const UPDATED_AT = 'so_delivery_updated_at';
  
  public $status = [
    'IN' => ['MASUK', 'success'],
    'OUT' => ['KELUAR', 'warning'],
  ];

  public function branch()
  {
        return $this->hasOne(Branch::class, 'inventory_branch_id', 'so_delivery_branch');
  }

  public function location()
  {
        return $this->hasOne(Location::class, 'inventory_location_id', 'so_delivery_location');
  }
}
