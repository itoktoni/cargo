<?php

namespace Modules\Crm\Dao\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'crm_category';
  protected $primaryKey = 'crm_category_id';
  protected $fillable = [
    'crm_category_id',
    'crm_category_name',
    'crm_category_description',
  ];

  public $timestamps = false;
  public $incrementing = true;
  public $rules = [
    'crm_category_name' => 'required',
  ];

  const CREATED_AT = 'crm_category_created_at';
  const UPDATED_AT = 'crm_category_created_by';

  public $searching = 'crm_category_name';
  public $datatable = [
    'crm_category_id'          => [false => 'ID'],
    'crm_category_name'        => [true => 'Name'],
    'crm_category_description'        => [true => 'Description'],
  ];
}
