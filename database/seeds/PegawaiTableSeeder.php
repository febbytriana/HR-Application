                         <?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PegawaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawais')->insert([
            'id_pegawai'    => '1',
            'nik'        	=> '11111',
            'nama'          => 'Pegawai 1 (Seeder)',
            'id_jabatan'    => '3',
            'tempat'        => 'Bandung',
            'tgl'           => '2002-02-07',
            'alamat'        => 'Disana',
            'jk'            => 'Perempuan',
            'agama'         => 'Islam',
            'warga_negara'  => 'WNI',
            'status_kawin'  => 'Belum Kawin',
            'goldar'        => 'O',
            'penyakit'      => 'Tidak Ada',
            'telp'          => '085603754023',
        	'email'    		=> 'pegawai1@gmail.com',
        	'created_at'	=> Carbon::now(),
        	'updated_at'	=> Carbon::now(),
        ]);

        DB::table('pegawais')->insert([
            'id_pegawai'    => '2',
            'id_user'       => '4',
            'nik'           => '22222',
            'nama'          => 'Pegawai 2 (Seeder)',
            'id_jabatan'    => '2',
            'tempat'        => 'Cimahi',
            'tgl'           => '2001-05-21',
            'alamat'        => 'Disini',
            'jk'            => 'Laki-laki',
            'agama'         => 'Islam',
            'warga_negara'  => 'WNI',
            'status_kawin'  => 'Belum Kawin',
            'goldar'        => 'AB',
            'penyakit'      => 'Tidak Ada',
            'telp'          => '088483473847',
            'email'         => 'pegawai2@gmail.com',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

    }
}
