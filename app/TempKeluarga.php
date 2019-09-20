<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempKeluarga extends Model
{
    protected $table = "temp_keluargas";
    protected $primaryKey = "temp_id_keluarga";
    protected $fillable = [
    	'id_pegawai',
    	'nama',
        'jk',
        'tempat',
        'tgl',
        'tempat',
        'tgl',
    	'status',
    ];
}
