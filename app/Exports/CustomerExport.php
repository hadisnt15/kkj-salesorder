<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

// jalankan di terminal composer require maatwebsite/excel
class CustomerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::select('CstCode','CstName','CstState','CstCity','CstAddress')->get();
    }
    public function headings(): array
    {
        return ['CstCode','CstName','CstState','CstCity','CstAddress'];
    }
}
