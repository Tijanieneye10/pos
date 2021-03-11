<?php

namespace App\Exports;


use App\Models\Expense;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExpenseExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
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
        return Expense::query()->with('user')
            ->whereDate('created_at', '<=', $this->startDate)
            ->whereDate('created_at', '<=', $this->endDate);
    }

    public function headings(): array
    {
        return [
            'Title',
            'Description',
            'Amount',
            'Recorded By',
            'Date'
        ];
    }

    public function map($expense): array
    {
        return [
            $expense->title,
            $expense->description,
            $expense->amount,
            $expense->user->fullname,
            $expense->date,
        ];
    }

    // With event is to make styling
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:E1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                ]);
            }
        ];
    }
}
