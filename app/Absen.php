<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absens';
    protected $primaryKey = 'id_absen';
    protected $fillable = [
        'id_absen',
        'id_pegawai',
        'tanggal',
        'status_absen',
        'ket',
        'jam_masuk',
        'jam_keluar'
    ];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_jabatan', 'id_jabatan');
    }

}
