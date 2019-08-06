<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratPeringatan extends Model
{
    protected $table = 'surat_peringatans';
    protected $primaryKey = 'id_sp';
    protected $fillable = [
        'id_pegawai',
        'perihal',
        'pelanggaran',
        'tgl_pelanggaran',
        'tgl_menghadap_hrd',
        'mulai_skorsing',
        'selesai_skorsing'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }

}
