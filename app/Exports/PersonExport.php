<?php

namespace App\Exports;

use App\Models\Donor\Person;
use Carbon\Carbon;
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
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PersonExport implements FromCollection, WithCustomStartCell, Responsable, WithMapping, WithHeadings, ShouldAutoSize, WithStyles, WithColumnFormatting
{

    use Exportable;
    private $reportElements;
    private $fileName = 'person.xlsx';
    private $writetype = Excel::XLSX;

    public function __construct($reportElements)
    {
        $this->reportElements = $reportElements;
    }

    public function collection()
    {
        return Person::reportElement($this->reportElements)->get();
    }

    public function startCell(): string
    {
        return 'A4';
    }

    public function headings(): array
    {
        return [
            'STATUS',
            'DOC.TYPE',
            'ID.NUMBER',
            'SURNAME',
            'NAME',
            'GENDER',
            'BLOOD TYPE',
            'ADDRESS',
            'DATE_ENTRY',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->setTitle('Person');
        $sheet->setAutoFilter('A4:I4');
        return [
            'A4:I4' =>
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

    public function map($donoreports): array
    {

        $dat_entry = $donoreports->DAT_ENTRY;
        $dat_register = Carbon::createFromFormat('Y-m-d h:i:s', $dat_entry)->format('d/m/Y');
        $dateExcel = NumberFormat::FORMAT_DATE_DATETIME;
        return [
            $donoreports->COD_ACCEPTED,
            $donoreports->TPDOC,
            $donoreports->COD_CIVILID,
            $donoreports->DES_SURNAME,
            $donoreports->DES_NAME,
            $donoreports->COD_GENDER,
            $donoreports->COD_GROUP,
            $donoreports->DES_ADDRESS,
            Date::stringToExcel($dat_register),
        ];
    }
}
