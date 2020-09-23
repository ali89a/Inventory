<?php


namespace App\Classes;

use App\Model\StockIn;
use App\Model\StockOut;

class AvailableProductCalculation
{
    public static function product_id($id)
    {
        $product_stock_in = StockIn::where(['product_id'=>$id])->sum('quantity');
        $product_stock_out = StockOut::where(['product_id'=>$id])->sum('quantity');

        if ($product_stock_in){
            return $product_stock_in - $product_stock_out;
        }else{
            return '0';
        }
    }
}
