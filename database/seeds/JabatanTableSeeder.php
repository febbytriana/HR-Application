<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('jabatans')->insert([
            'id_jabatan'    => '1',
        	'jabatan'       => 'Software Tester',
        	'gaji_pokok'    => '3500000',
            'jam_masuk'     => '09:00:00',
            'jam_keluar'    => '18:00:00',
        	'created_at'	=> Carbon::now(),
        	'updated_at'	=> Carbon::now(),
        ]);

         DB::table('jabatans')->insert([
            'id_jabatan'    => '2',
            'jabatan'       => 'Game Tester',
            'gaji_pokok'    => '6000000',
            'jam_masuk'     => '09:00:00',
            'jam_keluar'    => '18:00:00',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

         DB::table('jabatans')->insert([
            'id_jabatan'    => '3',
            'jabatan'       => 'Back-End',
            'gaji_pokok'    => '4500000',
            'jam_masuk'     => '09:00:00',
            'jam_keluar'    => '18:00:00',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);


         DB::table('jabatans')->insert([
            'id_jabatan'    => '4',
            'jabatan'       => 'Front-End',
            'gaji_pokok'    => '4500000',
            'jam_masuk'     => '09:00:00',
            'jam_keluar'    => '18:00:00',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
    }
}
