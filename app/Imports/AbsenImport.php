<?php

namespace App\Imports;

use App\Absen;
use Maatwebsite\Excel\Concerns\ToModel;

class AbsenImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Absen([
            'id_absen' => $row[0],
            'id_pegawai' => $row[1],
            'tgl' => $row[2],
            'bulan' => $row[3],
            'tahun' =>  $row[4],
            'keterangan' =. $row[5],
            'alasan' => $row[6],
            'jam_masuk' => $row[7],
            'jam_keluar' => $row[8],
        ]);
    }
}
