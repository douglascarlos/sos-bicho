@extends('layouts.app')

@section('content')
    {{ Form::open(['route' => 'animal-save', 'method' => 'POST', 'files' => true, 'class' => 'form']) }}

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Foto
                </div>

                <div class="card-img">
                    <div class="col col-md-4 mt-2" @if($animal->foto) style=" float: left;" @endif>
                        {{ Form::label('foto', 'Adicionar/substituir', ['class' => 'control-label']) }}
                        {{ Form::file('foto', ['disabled' => !auth()->user()->isUserCadastro($animal) && $animal->exists, 'class' => 'form-control']) }}
                    </div>
                    @if($animal->foto)
                    <div class="text-center p-2" style="float: right;">
                        <img src="{{ $animal->fotoInBase64() }}" alt="Foto" class="mt-2" style="max-width: 100%;">
                    </div>
                    @else
                        <div class="card-body"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="card">
        <div class="card-header">
            Dados
        </div>
        <div class="card-body">
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
                    {{ Form::label('user_adocao_id', 'Adotado por', ['class' => 'control-label']) }}
                    {{ Form::select('user_adocao_id', $users, old('user_adocao_id', $animal->user_adocao_id), ['placeholder' => 'Não adotado', 'disabled' => !auth()->user()->isUserCadastro($animal) && $animal->exists, 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="row" style="float: right;">
                <div class="col">
                {{ link_to_route('animal-index', $title = 'Voltar', $parameters = [], $attributes = ['class' => 'btn']) }}
                {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}

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
