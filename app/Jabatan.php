<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatans';
    protected $primaryKey = 'id_jabatan';
    protected $fillable = [
        'jabatan',
        'gaji_pokok',
        'jam_masuk',
        'jam_keluar',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_jabatan', 'id_jabatan');
    }
}
