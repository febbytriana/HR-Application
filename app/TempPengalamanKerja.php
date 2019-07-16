<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempPengalamanKerja extends Model
{
    protected $table = "temp_pengalaman_kerjas";
    protected $primaryKey = "id";
    protected $fillable = [
    	'id_pegawai',
    	'nama_perusahaan',
    	'jabatan',
    	'tahun',

    ];

    public function pegawai()
    {
        return $this->hasOne(TempPegawai::class, 'id_pegawai', 'id');
    }
}
