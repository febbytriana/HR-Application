<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempSertifikat extends Model
{
    protected $table = "temp_sertifikats";
    protected $primaryKey = "id_temp_sertifikat";
    protected $fillable = [
    	'id_sertifikat',
    	'sertifikat',
    	'tahun',

    ];

    public function sertifikat()
    {
        return $this->belongsTo(Pengalaman::class, 'id_sertifikat', 'id_sertifikat');
    }
}
