<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratPerjalanan extends Model
{
    protected $table = 'surat_perjalanans';
    protected $primaryKey = 'id_surat';
    protected $fillable = [
        'id_pegawai',
        'kegiatan',
        'sponsor',
        'tujuan',
        'tgl_berangkat',
        'tgl_pulang',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
