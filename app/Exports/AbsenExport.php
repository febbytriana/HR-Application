<?php

namespace App\Exports;

use App\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;

class AbsenExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id;

    function __construct($id){
    	$this->id_pegawai = $id;
    } 

    public function collection()
    {
        return Absen::all()->where('id_pegawai',$this->id_pegawai);
    }
}
