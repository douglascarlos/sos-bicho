<?php

use Illuminate\Database\Seeder;

class PortesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \SOSBicho\Models\Porte::create([
            'nome' => 'Pequeno'
        ]);

        \SOSBicho\Models\Porte::create([
            'nome' => 'Médio'
        ]);

        \SOSBicho\Models\Porte::create([
            'nome' => 'Grande'
        ]);
    }
}
