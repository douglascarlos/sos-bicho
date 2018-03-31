@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Filtros
        </div>
        <div class="card-body">
            {{ Form::open(['route' => 'animal-save', 'method' => 'POST', 'files' => true, 'class' => 'form']) }}
            {{ Form::hidden('id', $animal->id) }}
            <div class="row">
                <div class="col col-md-4">
                    {{ Form::label('nome', 'Nome', ['class' => 'control-label']) }}
                    {{ Form::text('nome', old('nome', $animal->nome), ['class' => 'form-control']) }}
                </div>

                <div class="col col-md-4">
                    {{ Form::label('raca_id', 'Raça', ['class' => 'control-label']) }}
                    {{ Form::select('raca_id', $racas, old('raca_id', $animal->raca_id), ['placeholder' => 'Selecione', 'class' => 'form-control']) }}
                </div>

                <div class="col col-md-4">
                    {{ Form::label('porte_id', 'Porte', ['class' => 'control-label']) }}
                    {{ Form::select('porte_id', $portes, old('porte_id', $animal->porte_id), ['placeholder' => 'Selecione', 'class' => 'form-control']) }}
                </div>

                <div class="col col-md-4">
                    {{ Form::label('nascimento', 'Nascimento', ['class' => 'control-label']) }}
                    {{ Form::date('nascimento', old('nascimento', $animal->nascimento), ['class' => 'form-control']) }}
                </div>

                <div class="col col-md-4">
                    {{ Form::label('foto', 'Foto', ['class' => 'control-label']) }}
                    {{ Form::file('foto', ['class' => 'form-control', 'ext' => '.pdf']) }}
                </div>
            </div>
            <div style="float: right;">
                {{ link_to_route('animal-index', $title = 'Voltar', $parameters = [], $attributes = ['class' => 'btn']) }}
                {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
