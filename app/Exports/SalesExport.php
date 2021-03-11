<?php

namespace App\Exports;

use App\Models\Shoppingcart;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SalesExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping, WithEvents
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $startDate, $endDate;



    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function query()
    {
        return Shoppingcart::query()->with('user')
            ->whereDate('created_at', '<=', $this->startDate)
            ->whereDate('created_at', '<=', $this->endDate);

    }

    public function headings(): array
    {
        return [
            'Product',
            'Quantity',
            'Price',
            'Sold By',
            'Sub Total',
            'Ref',
            'Created At'
        ];
    }

    public function map($product): array
    {
        return [
            $product->product_name,
            $product->product_qty,
            $product->product_price,
            $product->user->fullname,
            $product->sub_total,
            $product->trans_code,
            $product->created_at
        ];
    }

    // With event is to make styling
    public function registerEvents() : array
    {
            return [
                AfterSheet::class => function (AfterSheet $event){
                    $event->sheet->getStyle('A1:G1')->applyFromArray([
                        'font'=>[
                            'bold'=> true
                        ],
                    ]);
                }
            ];
    }

}
