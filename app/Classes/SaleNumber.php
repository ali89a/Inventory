<?php


namespace App\Classes;

use App\Model\Sale;

class SaleNumber
{
    public static function serial_number()
    {
        $serial = self::count_last_serial_for_training() + 1;
        return $serial_number = date('Y') . date('m') . str_pad($serial, 3, '0', STR_PAD_LEFT);

    }
    private static function count_last_serial_for_training()
    {
        return Sale::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();

    }
}
