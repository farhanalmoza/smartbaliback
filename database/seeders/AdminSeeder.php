<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrator')->insert([
            'name' => 'demo',
            'email' => 'demo@gmail.com',
            'password' => Hash::make('demo'),
            'email_verified_at' => '2021-11-19 00:28:10'
        ]);
    }
}
