<?php

namespace App\Exports;

use App\Models\Inventories\delivery\validatereceived;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ShippingExport implements FromCollection, WithCustomStartCell, Responsable, WithMapping, WithHeadings, ShouldAutoSize, WithStyles, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    private $reportElementsShipping;
    private $fileName = 'shipping.xlsx';
    private $writetype = Excel::XLSX;

    public function __construct($reportElementsShipping)
    {
        $this->reportElementsShipping = $reportElementsShipping;
    }

    public function collection()
    {
        return validatereceived::filterElement($this->reportElementsShipping)->get();
    }

    public function startCell(): string
    {
        return 'A3';
    }

    public function headings(): array
    {
        return [
            ['REPORT OF SHIPMENTS OF CAPTURED UNITS '],
            [
                'create_at',
                'customer',
                'boxes',
                'unities',
                'through',
                'id_status',
                'news',
                'received_date',
            ],

        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->setTitle('Shipping');
        $sheet->setAutoFilter('A4:I4');
        return [
            'A3:I4' =>
            [
                'font' => [
                    'bold' => true,
                    'name' => 'Arial',
                ],
                'alignment' => [
                    'horizontal' => 'center',
                ],
                'fill' => [
                    'fillType' => 'solid', 'startColor' => [
                        'argb' => 'C5D9F1',
                    ],
                ],
            ],

            'A4:I' . $sheet->getHighestRow() =>
            [
                'borders' => [
                    'allBorders' => ['borderStyle' => 'thin',
                    ],
                ],
            ],

            'all' => [

            ],
        ];

    }

    public function columnFormats(): array
    {
        return [
            'I' => 'dd/mm/yyyy',
        ];
    }

    public function map($deliveryreports): array
    {

        /*  $dat_entry = $donoreports->DAT_ENTRY;
        $dat_register = Carbon::createFromFormat('Y-m-d h:i:s', $dat_entry)->format('d/m/Y');
        $dateExcel = NumberFormat::FORMAT_DATE_DATETIME; */
        return [
            $deliveryreports->created_at,
            $deliveryreports->center->DES_CENTRE,
            $deliveryreports->boxes,
            $deliveryreports->unities,
            $deliveryreports->delivery->des_delivery,
            $deliveryreports->status->status_name,
            $deliveryreports->news,
            /*  Date::stringToExcel($dat_register), */
        ];
    }

    /* public function collection()
{
return validatereceived::all();
} */
}
