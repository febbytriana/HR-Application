<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempPegawai extends Model
{
    protected $table = "temp_pegawais";
    protected $primaryKey = "id_temp_pegawai";
    protected $fillable = [
        'id_pegawai',
    	'nama',
    	'jk',
    	'tempat',
    	'tgl',
    	'agama',

    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
