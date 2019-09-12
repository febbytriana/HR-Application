<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'gajis';
    protected $primaryKey = 'id_gaji';
    protected $fillable = [
        'id_gaji',
        'id_pegawai',
        'bulan',
        'gaji_pokok',
        'gaji_harian',
        'tunjangan_keluarga',
        'tunjangan_anak',
        'pph',
        'ppn',
        'total',
    ];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
