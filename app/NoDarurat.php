<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoDarurat extends Model
{
    protected $table = "no_darurats";
    protected $primaryKey = "id_no_darurat";
    protected $fillable = [
    	'id_pegawai',
    	'nama',
    	'status',
    	'nomor',
    ];

    public function tempNoDarurat()
    {
    	return $this->hasOne(TempNoDarurat::class, 'id_no_darurat', 'id_no_darurat');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
