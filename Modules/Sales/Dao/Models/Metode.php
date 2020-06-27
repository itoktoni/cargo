<?php

namespace Modules\Sales\Dao\Models;

use Illuminate\Database\Eloquent\Model;

class Metode extends Model
{
  protected $table = 'sales_metode';
  protected $primaryKey = 'sales_metode_id';
  protected $fillable = [
    'sales_metode_id',
    'sales_metode_name',
    'sales_metode_description',
  ];

  public $timestamps = false;
  public $incrementing = true;
  public $rules = [
    'sales_metode_name' => 'required',
  ];

  const CREATED_AT = 'sales_metode_created_at';
  const UPDATED_AT = 'sales_metode_created_by';

  public $searching = 'sales_metode_name';
  public $datatable = [
    'sales_metode_id'          => [false => 'ID'],
    'sales_metode_name'        => [true => 'Name'],
    'sales_metode_description'        => [true => 'Description'],
  ];
}
