<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \SOSBicho\Models\User::create([
            'name' => 'Douglas',
            'email' => 'dnevescarlos@gmail.com',
            'password' => \Hash::make('123123'),
        ]);

        \SOSBicho\Models\User::create([
            'name' => 'Paula',
            'email' => 'paula.danieli@gmail.com',
            'password' => \Hash::make('123123'),
        ]);
    }
}
