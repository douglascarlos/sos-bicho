<?php

use Illuminate\Database\Seeder;

class AnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \SOSBicho\Models\Animal::create([
            'raca_id' => \SOSBicho\Models\Raca::where('nome', 'Box')->first()->id,
            'porte_id' => \SOSBicho\Models\Porte::where('nome', 'Médio')->first()->id,
            'user_cadastro_id' => \SOSBicho\Models\User::where('name', 'Douglas')->first()->id,
            'nome' => 'Diule',
            'nascimento' => \Carbon\Carbon::createFromFormat('d/m/Y', '04/07/2009'),
        ]);

        \SOSBicho\Models\Animal::create([
            'raca_id' => \SOSBicho\Models\Raca::where('nome', 'Vira lata')->first()->id,
            'porte_id' => \SOSBicho\Models\Porte::where('nome', 'Pequeno')->first()->id,
            'user_cadastro_id' => \SOSBicho\Models\User::where('name', 'Paula')->first()->id,
            'nome' => 'Pretinho',
            'nascimento' => \Carbon\Carbon::createFromFormat('d/m/Y', '15/11/2017'),
        ]);

        \SOSBicho\Models\Animal::create([
            'raca_id' => \SOSBicho\Models\Raca::where('nome', 'Vira lata')->first()->id,
            'porte_id' => \SOSBicho\Models\Porte::where('nome', 'Médio')->first()->id,
            'user_cadastro_id' => \SOSBicho\Models\User::where('name', 'Paula')->first()->id,
            'nome' => 'Tigre',
            'nascimento' => \Carbon\Carbon::createFromFormat('d/m/Y', '20/10/2016'),
        ]);

        \SOSBicho\Models\Animal::create([
            'raca_id' => \SOSBicho\Models\Raca::where('nome', 'Preguiçoso')->first()->id,
            'porte_id' => \SOSBicho\Models\Porte::where('nome', 'Grande')->first()->id,
            'user_cadastro_id' => \SOSBicho\Models\User::where('name', 'Douglas')->first()->id,
            'nome' => 'Garfield',
            'nascimento' => \Carbon\Carbon::createFromFormat('d/m/Y', '28/03/1995'),
        ]);

        \SOSBicho\Models\Animal::create([
            'raca_id' => \SOSBicho\Models\Raca::where('nome', 'Preguiçoso')->first()->id,
            'porte_id' => \SOSBicho\Models\Porte::where('nome', 'Pequeno')->first()->id,
            'user_cadastro_id' => \SOSBicho\Models\User::where('name', 'Paula')->first()->id,
            'nome' => 'Mintia',
            'nascimento' => \Carbon\Carbon::createFromFormat('d/m/Y', '14/06/2002'),
        ]);
    }
}
