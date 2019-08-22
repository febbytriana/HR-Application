<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikans';
    protected $primaryKey = 'id_pendidikan';
    protected $fillable = [
        'id_pendidikan',
        'sd',
        'lulus_sd',
        'smp',
        'lulus_smp',
        'smk',
        'lulus_smk',
        'tingkat_pt',
        'nama_universitas',
        'lulus_pt',
        'id_pegawai',
    ];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
