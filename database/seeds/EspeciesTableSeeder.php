<?php

use Illuminate\Database\Seeder;

class EspeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \SOSBicho\Models\Especie::create([
            'nome' => 'Cachorro'
        ]);
        \SOSBicho\Models\Especie::create([
            'nome' => 'Gato'
        ]);
    }
}
