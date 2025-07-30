<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Customer([
            'CstCode' => $row['cstcode'] ?? null,
            'CstName' => $row['cstname'] ?? null,
            'CstPerson' => $row['cstperson'] ?? null,
            'CstPhoneNum' => $row['cstphonenum'] ?? null,
            'CstState' => $row['cststate'] ?? null,
            'CstCity' => $row['cstcity'] ?? null,
            'CstAddress' => $row['cstaddress'] ?? null,
        ]);
    }

    public function headingRow(): int
    {
        return 1; // baris ke berapa header dimulai
    }

    public function onFailure(Failure ...$failures)
    {
        // Log atau tampilkan error baris
        dd($failures);
    }
}
