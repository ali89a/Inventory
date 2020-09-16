<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'company_id',
        'product_category_id',
        'product_brand_id',
        'product_group_id',
        'unit_of_measurement_id',
        'name',
        'short_name',
        'code',
        'sku',
        'description',
        'alert_quantity',
        'selling_price',
        'discount',
        'creator_user_id',
        'updator_user_id',
    ];
    public function unit_of_measurement(){
        return $this->belongsTo(UnitOfMeasurement::class);
    }
    public function product_category(){
        return $this->belongsTo(ProductCategory::class);
    }
    public function product_brand(){
        return $this->belongsTo(ProductBrand::class);
    }
    public function product_group(){
        return $this->belongsTo(ProductGroup::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function creator_user(){
        return $this->belongsTo(User::class,'creator_user_id');
    }
    public function updator_user(){
        return $this->belongsTo(User::class,'updator_user_id');
    }
}
