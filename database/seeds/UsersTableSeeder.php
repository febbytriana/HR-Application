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
            'id'    => '1',
        	'name'    => 'Febby',
        	'email'    => 'febby@gmail.com',
        	'password' => '$2y$10$2agbYlfLenAtqluoFEcRku9e6F.1MLOwh8ATHvmI8GVOpf/HgEC/i',
        	'status'    => 'Admin',
        	'remember_token' => '1',
        	'created_at'	=> Carbon::now(),
        	'updated_at'	=> Carbon::now(),
        ]);

         DB::table('users')->insert([
            'id'    => '2',
        	'name'    => 'Risma',
        	'email'    => 'risma@gmail.com',
        	'password' => '$2y$10$2agbYlfLenAtqluoFEcRku9e6F.1MLOwh8ATHvmI8GVOpf/HgEC/i',
        	'status'    => 'HR',
        	'remember_token' => '1',
        	'created_at'	=> Carbon::now(),
        	'updated_at'	=> Carbon::now(),
        ]);
        
         DB::table('users')->insert([
            'id'    => '3',
        	'name'    => 'Ahmad',
        	'email'    => 'ahmad@gmail.com',
        	'password' => '$2y$10$2agbYlfLenAtqluoFEcRku9e6F.1MLOwh8ATHvmI8GVOpf/HgEC/i',
        	'status'    => 'Pegawai',
        	'remember_token' => '1',
        	'created_at'	=> Carbon::now(),
        	'updated_at'	=> Carbon::now(),
        ]); 
    }
}
