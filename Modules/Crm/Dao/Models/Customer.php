<?php

namespace Modules\Crm\Dao\Models;

use Modules\Crm\Dao\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Modules\Rajaongkir\Dao\Models\Area;

class Customer extends Model
{
  protected $table = 'crm_customer';
  protected $primaryKey = 'crm_customer_id';
  protected $fillable = [
    'crm_customer_id',
    'crm_customer_name',
    'crm_customer_email',
    'crm_customer_phone',
    'crm_customer_rajaongkir_area_id',
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
    'crm_customer_email'        => [true => 'Email'],
    'crm_customer_phone'        => [true => 'Phone'],
    'crm_customer_address'  => [true => 'Address'],  
  ];
  
    public function Category()
    {
        return $this->hasOne(Category::class, 'crm_category_id', 'crm_customer_crm_category_id');
    }
    
    public function Area()
    {
        return $this->hasOne(Area::class, 'rajaongkir_area_id', 'crm_customer_rajaongkir_area_id');
    }

}
