<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    protected $table = "pengalaman_kerjas";
    protected $primaryKey = "id_pengalaman";
    protected $fillable = [
    	'id_pegawai',
    	'nama_perusahaan',
    	'jabatan',
    	'tahun',

    ];

    public function tempPengalamanKerja()
    {
    	return $this->hasOne(TempPengalamanKerja::class, 'id_pengalaman', 'id_pengalaman');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
