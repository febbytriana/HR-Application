<?php

namespace App\Exports;

use App\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;

class AbsenAllExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return Absen::all();
    }
}
