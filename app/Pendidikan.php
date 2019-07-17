<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = "pendidikans";
    protected $primaryKey = "id_pendidikan";
    protected $fillable = [
    	'id_pegawai',
    	'sekolah',
    	'tahun_lulus',
    ];

    public function tempPendidikan()
    {
    	return $this->hasOne(TempPendidikan::class, 'id_pendidikan', 'id_pendidikan');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
