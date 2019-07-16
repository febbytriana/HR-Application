<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempPendidikan extends Model
{
    protected $table = "temp_pendidikans";
    protected $primaryKey = "id";
    protected $fillable = [
    	'id_pegawai',
    	'sekolah',
    	'tahun_lulus',

    ];

    public function pegawai()
    {
        return $this->hasOne(TempPegawai::class, 'id_pegawai', 'id');
    }
}
