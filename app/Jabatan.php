<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{

    protected $table = "jabatans";
    protected $primaryKey = "id_jabatan";
    protected $fillable = [
    	"jabatan",
    	"gaji_pokok",
    ];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id_jabatan', 'id_jabatan');
    }

}
