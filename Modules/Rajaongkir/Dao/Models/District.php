<?php

namespace Modules\Rajaongkir\Dao\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
  protected $table = 'rajaongkir_districts';
  protected $primaryKey = 'rajaongkir_district_id';
  protected $fillable = [
    'rajaongkir_district_id',
    'rajaongkir_district_name',
  ];

  public $timestamps = false;
  public $incrementing = true;
  public $rules = [
    'rajaongkir_district_name' => 'required',
  ];

  const CREATED_AT = 'rajaongkir_district_created_at';
  const UPDATED_AT = 'rajaongkir_district_created_by';

  public $searching = 'rajaongkir_district_name';
  public $datatable = [
    'rajaongkir_district_id'          => [true => 'ID'],
    'rajaongkir_district_name'        => [true => 'Name'],
  ];
}
