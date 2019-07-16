<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempNoDarurat extends Model
{
    protected $table = "temp_no_darurats";
    protected $primaryKey = "id";
    protected $fillable = [
    	'id_pegawai',
    	'nama',
    	'status',
    	'nomor',

    ];

    public function pegawai()
    {
        return $this->hasOne(TempPegawai::class, 'id_pegawai', 'id');
    }
}
