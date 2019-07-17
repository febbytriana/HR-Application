<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $table = "pelatihans";
    protected $primaryKey = "id_pelatihan";
    protected $fillable = [
    	'id_pegawai',
    	'nama_event',
    	'tempat_pelatihan',
    	'peran',
    	'tanggal',

    ];

    public function tempPelatihan()
    {
    	return $this->hasOne(TempPelatihan::class, 'id_pelatihan', 'id_pelatihan');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
