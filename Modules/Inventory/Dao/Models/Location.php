<?php

namespace Modules\Inventory\Dao\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  protected $table = 'inventory_location';
  protected $primaryKey = 'inventory_location_id';
  protected $fillable = [
    'inventory_location_id',
    'inventory_location_inventory_warehouse_id',
    'inventory_location_code',
    'inventory_location_name',
    'inventory_location_description',
    'inventory_location_created_at',
    'inventory_location_created_by',
  ];  

  public $timestamps = false;
  public $incrementing = true;
  public $rules = [
    'inventory_location_name' => 'required|min:3',
  ];

  const CREATED_AT = 'inventory_location_created_at';
  const UPDATED_AT = 'inventory_location_created_by';

  public $searching = 'inventory_location_name';
  private static $inventory;
  public $datatable = [
    'inventory_location_id'          => [false => 'ID'],
    'inventory_location_name'        => [true => 'Name'],
    'inventory_warehouse_name'       => [true => 'Inventory'],
    'inventory_location_description' => [true => 'Description'],
  ];

  public $status = [
    '1' => ['Active', 'primary'],
    '0' => ['Not Active', 'danger'],
  ];

  public function warehouse()
  {
    return $this->hasOne(Warehouse::class, 'inventory_warehouse_id', 'inventory_location_inventory_warehouse_id');
  }

}
