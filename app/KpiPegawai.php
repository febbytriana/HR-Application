<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KpiPegawai extends Model
{
    
    protected $table = "kpi_pegawais";
    protected $primaryKey = "id_kpi";
    protected $fillable = [
    	'id_pegawai',
    	'index1',
    	'index2',
    	'index3',
    	'index4',
    	'index5',
    	'index6',
    	'index7',
    	'index8',
    	'index9',
    	'index10',
    ];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
