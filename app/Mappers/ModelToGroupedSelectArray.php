<?php

namespace SOSBicho\Mappers;

use Illuminate\Database\Eloquent\Model;

class ModelToGroupedSelectArray{

    public static function map(Model $model, $related){
        $selectArray = collect([]);
        foreach ($model->all() as $object){
            $group = collect([]);
            if($selectArray->has($object->$related->nome)){
                $group = collect($selectArray->get($object->$related->nome));
            }
            $group->put($object->id, $object->nome);
            $selectArray->put($object->$related->nome, $group->toArray());
        }
        return $selectArray;
    }

}