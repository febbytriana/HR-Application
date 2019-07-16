<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempPelatihan extends Model
{
    protected $table = "temp_pelatihans";
    protected $primaryKey = "id";
    protected $fillable = [
    	'id_pegawai',
    	'nama_event',
    	'tempat_pelatihan',
    	'peran',
    	'tanggal',

    ];

    public function pegawai()
    {
        return $this->hasOne(TempPegawai::class, 'id_pegawai', 'id');
    }
}
