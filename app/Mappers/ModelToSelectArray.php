<?php

namespace SOSBicho\Mappers;

use Illuminate\Database\Eloquent\Model;

class ModelToSelectArray{

    public static function map(Model $model, $attribute = 'nome'){
        $selectArray = collect([]);
        foreach ($model->all() as $object){
            $selectArray->put($object->id, $object->$attribute);
        }
        return $selectArray;
    }

}