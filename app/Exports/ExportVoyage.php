<?php

namespace App\Exports;

use App\Models\Voyage;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportVoyage implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Voyage::all();
    }
    public function headings(): array
    {
        return ["Date Voyage", "transit", "camion", "Commission", "montant", "Montant gasoil", "gasoil en litre", "piece", "pneu", "vatsy"];
    }
}

