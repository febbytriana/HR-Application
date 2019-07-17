<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempKontrak extends Model
{
    protected $table = "temp_kontraks";
    protected $primaryKey = "id_temp_kontrak";
    protected $fillable = [
    	'id_kontrak',
    	'kontrak',
    	'tahun',
    ];

    public function kontrak()
    {
        return $this->belongsTo(Kontrak::class, 'id_kontrak', 'id_kontrak');
    }
}
