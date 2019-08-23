<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawais";
    protected $primaryKey = "id_pegawai";
    protected $fillable = [
        'kode_pegawai',
        'nik',
        'nama',
        'id_jabatan',
        'tempat',
        'tgl',
        'alamat',
        'jk',
        'agama',
        'warga_negara',
        'status_kawin',
        'goldar',
        'penyakit',
    	'telp',	
    	'email',
        'image',
    ];

    public function tempPegawai()
    {
        return $this->hasOne(TempPegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function jabatan()
    {
        return $this->hasOne(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }
    public function keluarga()
    {
        return $this->hasMany(Keluarga::class, 'id_pegawai', 'id_pegawai');
    }

    public function kontrak()
    {
        return $this->hasMany(Kontrak::class, 'id_pegawai', 'id_pegawai');
    }

    public function noDarurat()
    {
        return $this->hasMany(NoDarurat::class, 'id_pegawai', 'id_pegawai');
    }

    public function pelatihan()
    {
        return $this->hasMany(Pelatihan::class, 'id_pegawai', 'id_pegawai');
    }

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'id_pegawai', 'id_pegawai');
    }

    public function pengalamanKerja()
    {
        return $this->hasMany(PengalamanKerja::class, 'id_pegawai', 'id_pegawai');
    }

    public function sertifikat()
    {
        return $this->hasMany(Sertifikat::class, 'id_pegawai', 'id_pegawai');
    }
    public function suratPerjalanan() 
    {
        return $this->hasOne(SuratPerjalanan::class, 'id_pegawai', 'id_pegawai');
    }
    public function suratPeringatan() 
    {
        return $this->hasOne(SuratPeringatan::class, 'id_pegawai', 'id_pegawai');
    }
}
   

