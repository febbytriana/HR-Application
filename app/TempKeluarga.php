<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempKeluarga extends Model
{
    
	protected $table = "temp_keluargas";
    protected $primaryKey = "id_temp_keluarga";
    protected $fillable = [
    	'id_keluarga',
    	'nama',
    	'status',

    ];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'id_keluarga', 'id_keluarga');
    }

}
