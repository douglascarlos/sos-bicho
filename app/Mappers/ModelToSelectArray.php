<?php

namespace SOSBicho\Mappers;

use Illuminate\Database\Eloquent\Model;

class ModelToSelectArray{

    public static function map(Model $model){
        $selectArray = collect([]);
        foreach ($model->all() as $object){
            $selectArray->put($object->id, $object->nome);
        }
        return $selectArray;
    }

}