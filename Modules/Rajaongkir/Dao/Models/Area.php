<?php

namespace Modules\Rajaongkir\Dao\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  protected $table = 'rajaongkir_areas';
  protected $primaryKey = 'rajaongkir_area_id';
  protected $fillable = [
    'rajaongkir_area_id',
    'rajaongkir_area_name',
  ];

  public $timestamps = false;
  public $incrementing = true;
  public $rules = [
    'rajaongkir_area_name' => 'required',
  ];

  const CREATED_AT = 'rajaongkir_area_created_at';
  const UPDATED_AT = 'rajaongkir_area_created_by';

  public $searching = 'rajaongkir_area_name';
  public $datatable = [
    'rajaongkir_area_id'          => [true => 'ID'],
    'rajaongkir_area_name'        => [true => 'Name'],
  ];
}
