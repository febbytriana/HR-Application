<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'            => '1',
        	'nama'          => 'Admin',
        	'email'         => 'admin@gmail.com',
        	'password'      => '$2y$10$fqdNPDZ9AjGHrdvVhJpZ2OE6mSklmngVI2vot0Cs.rnKlNJkfd30y', //admin123
        	'status'        => 'Admin',
        	'remember_token'=> '1',
        	'created_at'	=> Carbon::now(),
        	'updated_at'	=> Carbon::now(),
        ]);

        DB::table('users')->insert([
            'id'            => '2',
        	'nama'          => 'HR',
        	'email'         => 'hr@gmail.com',
        	'password'      => '$2y$10$nGT3nJgrepaYxDTMuNQP7u5bHuCTEtMt.9NwRgZzSE1.56Offuh1K', //hr123
        	'status'        => 'HR',
        	'remember_token'=> '1',
        	'created_at'	=> Carbon::now(),
        	'updated_at'	=> Carbon::now(),
        ]);
        
        DB::table('users')->insert([
            'id'            => '3',
        	'nama'          => 'HR 2',
        	'email'         => 'hr2@gmail.com',
        	'password'      => '$2y$10$9X6xTmy8HEjnK4MoFwFVeeGCtfmYXI38e5e6HmjWnn0jskCIlo.Rq', //hrr123
        	'status'        => 'Pegawai',
        	'remember_token'=> '1',
        	'created_at'	=> Carbon::now(),
        	'updated_at'	=> Carbon::now(),
        ]); 

        DB::table('users')->insert([
            'id'            => '4',
            'nama'          => 'Pegawai',
            'email'         => 'pegawai@gmail.com',
            'password'      => '$2y$10$REPQs5uFEgusXdEWwXP5CO2TlTZ2oRGSeuVYy6u9H7l4uxBpF7WbC',//pegawai123
            'status'        => 'Pegawai',
            'remember_token'=> '1',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]); 
    }
}
