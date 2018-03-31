<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UsersTableSeeder::class,
             EspeciesTableSeeder::class,
             PortesTableSeeder::class,
             RacasTableSeeder::class,
             AnimalsTableSeeder::class,
         ]);
    }
}
