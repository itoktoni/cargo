<?php

namespace Modules\Inventory\Dao\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
  protected $table = 'inventory_branch';
  protected $primaryKey = 'inventory_branch_id';
  protected $fillable = [
    'inventory_branch_id',
    'inventory_branch_name',
    'inventory_branch_description',
  ];

  public $timestamps = false;
  public $incrementing = true;
  public $rules = [
    'inventory_branch_name' => 'required|min:3',
  ];

  const CREATED_AT = 'inventory_branch_created_at';
  const UPDATED_AT = 'inventory_branch_created_by';

  public $searching = 'inventory_branch_name';
  public $datatable = [
    'inventory_branch_id'          => [false => 'ID'],
    'inventory_branch_name'        => [true => 'Name'],
    'inventory_branch_description' => [true => 'Description'],
  ];

  public $status = [
    '1' => ['Active', 'primary'],
    '0' => ['Not Active', 'danger'],
  ];
}
