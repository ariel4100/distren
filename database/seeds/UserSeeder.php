<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Pablo',
            'username' => 'pablo',
            'email' => 'pcabanuz@osole.es',
            'password' => Hash::make('pablopablo'),
        ]);
        DB::table('users')->insert([
            'name' => 'Ariel',
            'username' => 'ariel',
            'email' => 'arielcallisaya00@gmail.com',
            'password' => Hash::make('arielariel'),
        ]);
    }
}
