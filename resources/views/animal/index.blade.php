@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Filtros
        </div>
        <div class="card-body">
            {{ Form::open(['route' => 'animal-index', 'method' => 'GET', 'class' => 'form']) }}

            <div class="row">
                <div class="col col-md-3">
                    {{ Form::label('especie_id', 'Espécie', ['class' => 'control-label']) }}
                    {{ Form::select('especie_id', $especies, old('especie_id', null), ['placeholder' => 'Todos', 'class' => 'form-control']) }}
                </div>

                <div class="col col-md-3">
                    {{ Form::label('porte_id', 'Porte', ['class' => 'control-label']) }}
                    {{ Form::select('porte_id', $portes, old('porte_id', null), ['placeholder' => 'Todos', 'class' => 'form-control']) }}
                </div>
            </div>
            <div style="float: right;">
                {{ link_to_route('animal-create', $title = 'Novo Animal', $parameters = [], $attributes = ['class' => 'btn']) }}
                {{ link_to_route('animal-index', $title = 'Limpar', $parameters = [], $attributes = ['class' => 'btn']) }}
                {{ Form::submit('Buscar', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
    <br>
    <div class="row card-columns">
        @foreach($animais as $animal)
        <div class="col col-md-4">
            <div class="card">
                <div class="card-header">
                    {{ $animal->nome }}
                    Adotado
                </div>

                <div class="card-body">
                    {{ $animal->raca->especie->nome }}
                    <br>
                    {{ $animal->raca->nome }}
                    <br>
                    {{ $animal->porte->nome }}
                    <br>
                    {{ $animal->nascimento }}
                </div>

                <div class="card-footer">
                    Tenho interesse 12 Interessados
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
