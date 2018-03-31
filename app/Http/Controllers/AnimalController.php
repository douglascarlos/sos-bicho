<?php

namespace SOSBicho\Http\Controllers;

use Illuminate\Http\Request;
use SOSBicho\Http\Requests\AnimalSaveRequest;
use SOSBicho\Mappers\ModelToSelectArray;
use SOSBicho\Models\Animal;
use Exception;
use SOSBicho\Models\Especie;
use SOSBicho\Models\Porte;
use SOSBicho\Models\Raca;

class AnimalController extends Controller
{
    private $animalEloquent;
    private $porteEloquent;
    private $racaEloquent;
    private $especieEloquent;

    public function __construct(
        Animal $animalEloquent,
        Porte $porteEloquent,
        Raca $racaEloquent,
        Especie $especieEloquent
    )
    {
        $this->animalEloquent = $animalEloquent;
        $this->porteEloquent = $porteEloquent;
        $this->racaEloquent = $racaEloquent;
        $this->especieEloquent = $especieEloquent;
    }


    public function index(Request $request)
    {
        $portes = ModelToSelectArray::map($this->porteEloquent);
        $especies = ModelToSelectArray::map($this->especieEloquent);

        $animais = $this->animalEloquent->search($request);
        return view('animal.index')
            ->with(compact('especies','portes', 'animais'));
    }

    public function create()
    {
        try{
            $animal = $this->animalEloquent->newInstance();
            return $this->form($animal);
        }catch (Exception $exception) {
            dd($exception);
        }
    }

    public function edit($id)
    {
        try{
            $animal = $this->animalEloquent->findOrFail($id);
            return $this->form($animal);
        }catch (Exception $exception) {
            dd($exception);
        }
    }

    public function save(AnimalSaveRequest $request)
    {
        try{
            dd($request->all());
        }catch (Exception $exception) {
            dd($exception);
        }
    }

    private function form(Animal $animal)
    {
        $portes = ModelToSelectArray::map($this->porteEloquent);
        $racas = ModelToSelectArray::map($this->racaEloquent);
        return view('animal.form')
            ->with(compact('animal', 'portes', 'racas'));
    }
}
