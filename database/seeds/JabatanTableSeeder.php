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
        	'jabatan'    => 'Software Tester',
        	'gaji_pokok'    => '3.500.000,00',
        	'remember_token' => '1',
        	'created_at'	=> Carbon::now(),
        	'updated_at'	=> Carbon::now(),
        ]);


         DB::table('jabatans')->insert([
            'id_jabatan'    => '2',
        	'jabatan'    => 'Manager',
        	'gaji_pokok'    => '4.500.000,00',
        	'remember_token' => '1',
        	'created_at'	=> Carbon::now(),
        	'updated_at'	=> Carbon::now(),
        ]);
    }
}
