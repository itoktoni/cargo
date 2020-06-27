<?php

namespace Modules\Rajaongkir\Dao\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
  protected $table = 'rajaongkir_prices';
  protected $primaryKey = 'rajaongkir_price_id';
  protected $fillable = [
    'rajaongkir_price_id',
    'rajaongkir_price_name',
  ];

  public $timestamps = false;
  public $incrementing = true;
  public $rules = [
    'rajaongkir_price_name' => 'required',
  ];

  const CREATED_AT = 'rajaongkir_price_created_at';
  const UPDATED_AT = 'rajaongkir_price_created_by';

  public $searching = 'rajaongkir_price_name';
  public $datatable = [
    'rajaongkir_price_id'          => [true => 'ID'],
    'rajaongkir_price_name'        => [true => 'Name'],
  ];
}
