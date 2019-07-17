<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    protected $table = "kontraks";
    protected $primaryKey = "id_kontrak";
    protected $fillable = [
    	'id_pegawai',
    	'kontrak',
    	'tahun',
    ];

    public function tempKontrak()
    {
    	return $this->hasOne(TempKontrak::class, 'id_kontrak', 'id_kontrak');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
