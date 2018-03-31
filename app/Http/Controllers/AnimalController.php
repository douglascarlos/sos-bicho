<?php

namespace SOSBicho\Http\Controllers;

use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SOSBicho\Http\Requests\AnimalSaveRequest;
use SOSBicho\Mappers\ModelToGroupedSelectArray;
use SOSBicho\Mappers\ModelToSelectArray;
use SOSBicho\Models\Animal;
use Exception;
use SOSBicho\Models\Especie;
use SOSBicho\Models\Interesse;
use SOSBicho\Models\Porte;
use SOSBicho\Models\Raca;
use SOSBicho\Models\User;

class AnimalController extends Controller
{
    private $animalEloquent;
    private $porteEloquent;
    private $racaEloquent;
    private $especieEloquent;
    private $interesseEloquent;
    private $userEloquent;
    private $fileSystem;

    public function __construct(
        Animal $animalEloquent,
        Porte $porteEloquent,
        Raca $racaEloquent,
        Especie $especieEloquent,
        Interesse $interesseEloquent,
        User $userEloquent,
        FilesystemManager $fileSystem
    )
    {
        $this->animalEloquent = $animalEloquent;
        $this->porteEloquent = $porteEloquent;
        $this->racaEloquent = $racaEloquent;
        $this->especieEloquent = $especieEloquent;
        $this->interesseEloquent = $interesseEloquent;
        $this->userEloquent = $userEloquent;
        $this->fileSystem = $fileSystem->disk('public');
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
            return $this->errorMessage($exception, 'animal-index');
        }
    }

    public function edit($id)
    {
        try{
            $animal = $this->animalEloquent->findOrFail($id);
            return $this->form($animal);
        }catch (Exception $exception) {
            return $this->errorMessage($exception, 'animal-index');
        }
    }

    public function save(AnimalSaveRequest $request)
    {
        try{
            $animal = $this->animalEloquent->findOrNew($request->get('id'));
            $animal->fill($request->all());
            $animal->userCadastro()->associate(auth()->user());

            if($request->hasFile('foto')){

                if($animal->foto && $this->fileSystem->exists($animal->foto)){
                    $this->fileSystem->delete($animal->foto);
                }

                $animal->foto = sha1(microtime()) . '.' . $request->file('foto')->extension();

                $this->fileSystem->put(
                    $animal->foto,
                    file_get_contents($request->file('foto')->getPathname())
                );
            }

            $animal->save();

            return $this->successMessage('Animal salvo com sucesso.', 'animal-index');
        }catch (Exception $exception) {
            return $this->errorMessage($exception, 'animal-index');
        }
    }

    public function marcarInteresse($id)
    {
        try{
            $animal = $this->animalEloquent->findOrFail($id);
            $user = auth()->user();

            $interesse = $this->interesseEloquent->newInstance();
            $interesse->animal()->associate($animal);
            $interesse->pessoa()->associate($user);
            $interesse->save();

            return $this->successMessage('Interesse salvo com sucesso.', 'animal-index');
        }catch (Exception $exception) {
            return $this->errorMessage($exception, 'animal-index');
        }
    }

    public function removerInteresse($id)
    {
        try{
            $animal = $this->animalEloquent->findOrFail($id);
            $user = auth()->user();

            $interesse = $this->interesseEloquent
                ->where('animal_id', $animal->id)
                ->where('user_id', $user->id)
                ->get()->first();
            $interesse->delete();

            return $this->successMessage('Interesse removido com sucesso.', 'animal-index');
        }catch (Exception $exception) {
            return $this->errorMessage($exception, 'animal-index');
        }
    }

    private function form(Animal $animal)
    {
        $portes = ModelToSelectArray::map($this->porteEloquent);
        $racas = ModelToGroupedSelectArray::map($this->racaEloquent, 'especie');
        $users = ModelToSelectArray::map($this->userEloquent, 'name');
        return view('animal.form')
            ->with(compact('animal', 'portes', 'racas', 'users'));
    }
}
