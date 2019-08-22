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
<<<<<<< HEAD
        'jk',
        'tempat',
        'tgl',
=======
        'tempat',
        'tgl',
        'anak_ke',
>>>>>>> origin/master
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
