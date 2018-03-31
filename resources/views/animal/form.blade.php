@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Animal
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
                    {{ Form::label('nascimento', 'Data de nascimento', ['class' => 'control-label']) }}
                    {{ Form::date('nascimento', old('nascimento', $animal->nascimento), ['class' => 'form-control']) }}
                </div>

                <div class="col col-md-4">
                    {{ Form::label('foto', 'Foto', ['class' => 'control-label']) }}
                    {{ Form::file('foto', ['class' => 'form-control', 'ext' => '.pdf']) }}
                </div>

                <div class="col col-md-4">
                    {{ Form::label('user_adocao_id', 'Adotado por', ['class' => 'control-label']) }}
                    {{ Form::select('user_adocao_id', $users, old('user_adocao_id', $animal->user_adocao_id), ['placeholder' => 'Não adotado', 'disabled' => !auth()->user()->isUserCadastro($animal), 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="row" style="float: right;">
                <div class="col">
                {{ link_to_route('animal-index', $title = 'Voltar', $parameters = [], $attributes = ['class' => 'btn']) }}
                {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
    @if($animal->id)
    <br>
    <div class="row card-columns">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Pessoas Interessadas
                </div>
                <div class="card-body">
                    <ul>
                    @foreach($animal->pessoasInteressadas as $user)
                        <li>
                        {{ $user->name }} ({{ $user->email }})
                        </li>
                    @endforeach
                    @if($animal->pessoasInteressadas->isEmpty())
                        Não há pessoas interessadas neste momento.
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
