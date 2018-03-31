<?php

use Illuminate\Database\Seeder;

class RacasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \SOSBicho\Models\Raca::create([
            'especie_id' => \SOSBicho\Models\Especie::where('nome', 'Cachorro')->first()->id,
            'nome' => 'Vira lata'
        ]);

        \SOSBicho\Models\Raca::create([
            'especie_id' => \SOSBicho\Models\Especie::where('nome', 'Cachorro')->first()->id,
            'nome' => 'Box'
        ]);

        \SOSBicho\Models\Raca::create([
            'especie_id' => \SOSBicho\Models\Especie::where('nome', 'Cachorro')->first()->id,
            'nome' => 'Pintcher'
        ]);

        \SOSBicho\Models\Raca::create([
            'especie_id' => \SOSBicho\Models\Especie::where('nome', 'Cachorro')->first()->id,
            'nome' => 'Buldog Francês'
        ]);

        \SOSBicho\Models\Raca::create([
            'especie_id' => \SOSBicho\Models\Especie::where('nome', 'Cachorro')->first()->id,
            'nome' => 'Dalmata'
        ]);

        \SOSBicho\Models\Raca::create([
            'especie_id' => \SOSBicho\Models\Especie::where('nome', 'Cachorro')->first()->id,
            'nome' => 'São Bernardo'
        ]);

        \SOSBicho\Models\Raca::create([
            'especie_id' => \SOSBicho\Models\Especie::where('nome', 'Gato')->first()->id,
            'nome' => 'Vira lata'
        ]);

        \SOSBicho\Models\Raca::create([
            'especie_id' => \SOSBicho\Models\Especie::where('nome', 'Gato')->first()->id,
            'nome' => 'Ciamês'
        ]);

        \SOSBicho\Models\Raca::create([
            'especie_id' => \SOSBicho\Models\Especie::where('nome', 'Gato')->first()->id,
            'nome' => 'Preguiçoso'
        ]);
    }
}
