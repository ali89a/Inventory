<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
     public function items(){

        return $this->hasMany('App\Model\PurchaseItem', 'purchase_id');

    }
}
