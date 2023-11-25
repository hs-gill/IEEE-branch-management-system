<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return Order::all();
    }
}
