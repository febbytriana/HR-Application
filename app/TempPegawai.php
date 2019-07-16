<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempPegawai extends Model
{
    protected $table = "temp_pegawais";
    protected $primaryKey = "id";
    protected $fillable = [
    	'nama',
    	'jk',
    	'tempat',
    	'tgl',
    	'agama',

    ];


    public function keluarga()
    {
    	return $this->belongsTo(TempKeluarga::class, 'id', 'id_pegawai');
    }

    public function pendidikan()
    {
    	return $this->belongsTo(TempPendidikan::class, 'id', 'id_pegawai');
    }

    public function pengalaman()
    {
    	return $this->belongsTo(TempPengalamanKerja::class, 'id', 'id_pegawai');
    }

    public function sertifikat()
    {
    	return $this->belongsTo(TempSertifikat::class, 'id', 'id_pegawai');
    }

    public function pelatihan()
    {
    	return $this->belongsTo(TempPelatihan::class, 'id', 'id_pegawai');
    }

    public function darurat()
    {
    	return $this->belongsTo(TempNoDarurat::class, 'id', 'id_pegawai');
    }
}
