<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
     public function items(){

        return $this->hasMany('App\Model\PurchaseItem', 'purchase_id');

    }
     public function stock_items(){

        return $this->hasMany('App\Model\StockIn', 'purchase_id');

    }

}
