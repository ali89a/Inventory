<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    protected $fillable=[
        'name',
        'short_name',
        'description',
        'company_id',
        'creator_user_id',
        'updator_user_id',
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function creator_user(){
        return $this->belongsTo(User::class,'creator_user_id');
    }
    public function updator_user(){
        return $this->belongsTo(User::class,'updator_user_id');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
