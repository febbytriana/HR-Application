<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempPendidikan extends Model
{
    protected $table = "temp_pendidikans";
    protected $primaryKey = "id_temp_pendidikan";
    protected $fillable = [
    	'id_pendidikan',
    	'sekolah',
    	'tahun_lulus',

    ];

    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan', 'id_pendidikan');
    }
}
