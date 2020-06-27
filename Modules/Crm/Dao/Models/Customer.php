<?php

namespace Modules\Crm\Dao\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = 'crm_customer';
  protected $primaryKey = 'crm_customer_id';
  protected $fillable = [
    'crm_customer_id',
    'crm_customer_name',
    'crm_customer_email',
    'crm_customer_phone',
    'crm_customer_address',
    'crm_customer_notes',
    'crm_customer_crm_category_id',
  ];

  public $timestamps = false;
  public $incrementing = true;
  public $rules = [
    'crm_customer_name' => 'required|min:3',
    'crm_customer_crm_category_id' => 'required',
  ];

  const CREATED_AT = 'crm_customer_created_at';
  const UPDATED_AT = 'crm_customer_created_by';

  public $searching = 'crm_customer_name';
  public $datatable = [
    'crm_customer_id'          => [false => 'ID'],
    'crm_customer_name'        => [true => 'Name'],
    'crm_customer_email'        => [false => 'Email'],
    'crm_customer_phone'        => [false => 'Phone'],
    'crm_customer_address'  => [false => 'Address'],  
  ];
}
