<?php

namespace Modules\Sales\Dao\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'sales_category';
  protected $primaryKey = 'sales_category_id';
  protected $fillable = [
    'sales_category_id',
    'sales_category_name',
    'sales_category_description',
  ];

  public $timestamps = false;
  public $incrementing = true;
  public $rules = [
    'sales_category_name' => 'required',
  ];

  const CREATED_AT = 'sales_category_created_at';
  const UPDATED_AT = 'sales_category_created_by';

  public $searching = 'sales_category_name';
  public $datatable = [
    'sales_category_id'          => [false => 'ID'],
    'sales_category_name'        => [true => 'Name'],
    'sales_category_description'        => [true => 'Description'],
  ];
}
