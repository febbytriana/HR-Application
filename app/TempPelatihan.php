<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempPelatihan extends Model
{
    protected $table = "temp_pelatihans";
    protected $primaryKey = "id_temp_pelatihan";
    protected $fillable = [
    	'id_pelatihan',
    	'nama_event',
    	'tempat_pelatihan',
    	'peran',
    	'tanggal',

    ];

    public function pelatihan()
    {
        return $this->belongsTo(Keluarga::class, 'id_pelatihan', 'id_pelatihan');
    }
}
