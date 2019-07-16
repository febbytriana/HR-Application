<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempSertifikat extends Model
{
    protected $table = "temp_sertifikats";
    protected $primaryKey = "id";
    protected $fillable = [
    	'id_pegawai',
    	'sertifikat',
    	'tahun',

    ];

    public function pegawai()
    {
        return $this->hasOne(TempPegawai::class, 'id_pegawai', 'id');
    }
}
