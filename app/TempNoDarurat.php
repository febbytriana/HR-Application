<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempNoDarurat extends Model
{
    protected $table = "temp_no_darurats";
    protected $primaryKey = "id_temp_no";
    protected $fillable = [
    	'id_no_darurat',
    	'nama',
    	'status',
    	'nomor',

    ];

    public function noDarurat()
    {
        return $this->belongsTo(Keluarga::class, 'id_no_darurat', 'id_no_darurat');
    }

}
