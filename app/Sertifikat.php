<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $table = "sertifikats";
    protected $primaryKey = "id_sertifikat";
    protected $fillable = [
    	'id_pegawai',
    	'sertifikat',
    	'tahun',
    ];

    public function tempSertifikat()
    {
    	return $this->hasOne(TempSertifikat::class, 'id_sertifikat', 'id_sertifikat');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
