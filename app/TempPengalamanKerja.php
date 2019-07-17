<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempPengalamanKerja extends Model
{
    protected $table = "temp_pengalaman_kerjas";
    protected $primaryKey = "id_temp_pengalaman";
    protected $fillable = [
    	'id_pengalaman',
    	'nama_perusahaan',
    	'jabatan',
    	'tahun',

    ];

    public function pengalaman()
    {
        return $this->belongsTo(Pengalaman::class, 'id_pengalaman', 'id_pengalaman');
    }
}
