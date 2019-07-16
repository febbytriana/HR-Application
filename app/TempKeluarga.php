<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempKeluarga extends Model
{
    
	protected $table = "temp_keluargas";
    protected $primaryKey = "id";
    protected $fillable = [
    	'id_pegawai',
    	'nama',
    	'status',

    ];
	public function pegawai()
    {
        return $this->hasOne(TempPegawai::class, 'id_pegawai', 'id');
    }

}
