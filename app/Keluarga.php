<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = "keluargas";
    protected $primaryKey = "id_keluarga";
    protected $fillable = [
    	'id_pegawai',
    	'nama',
        'jk',
        'tempat',
        'tgl',
    	'status',
    ];

    public function tempKeluarga()
    {
    	return $this->hasOne(TempKeluarga::class, 'id_keluarga', 'id_keluarga');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
