<?php

namespace Modules\Inventory\Dao\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
  protected $table = 'inventory_warehouse';
  protected $primaryKey = 'inventory_warehouse_id';
  protected $fillable = [
    'inventory_warehouse_id',
    'inventory_warehouse_inventory_branch_id',
    'inventory_warehouse_code',
    'inventory_warehouse_name',
    'inventory_warehouse_description',
    'inventory_warehouse_created_at',
    'inventory_warehouse_created_by',
  ];

  public $timestamps = false;
  public $incrementing = true;
  public $rules = [
    'inventory_warehouse_name' => 'required|min:3',
  ];

  const CREATED_AT = 'inventory_warehouse_created_at';
  const UPDATED_AT = 'inventory_warehouse_created_by';

  public $searching = 'inventory_warehouse_name';
  private static $inventory;
  public $datatable = [
    'inventory_warehouse_id'          => [false => 'ID'],
    'inventory_warehouse_name'        => [true => 'Name'],
    'inventory_warehouse_name'       => [true => 'Inventory'],
    'inventory_warehouse_description' => [true => 'Description'],
  ];

  public $status = [
    '1' => ['Active', 'primary'],
    '0' => ['Not Active', 'danger'],
  ];

}
