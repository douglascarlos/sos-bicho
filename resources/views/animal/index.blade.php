@extends('layouts.app')

@section('content')
    <h1>Animais</h1>
    <div class="card">
        <div class="card-header">
            Filtros
        </div>
        <div class="card-body">
            {{ Form::open(['route' => 'animal-index', 'method' => 'GET', 'class' => 'form']) }}

            <div class="row">
                <div class="col col-md-4">
                    {{ Form::label('especie_id', 'Espécie', ['class' => 'control-label']) }}
                    {{ Form::select('especie_id', $especies, old('especie_id', null), ['placeholder' => 'Todos', 'class' => 'form-control']) }}
                </div>

                <div class="col col-md-4">
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

    <div class="card-columns">
        @foreach($animais as $animal)
            <div class="card">
                @if($animal->foto)
                    <img class="card-img-top" src="{{ $animal->fotoInBase64() }}" alt="Card image cap">
                @else
                    <img class="card-img-top" alt="Foto do animal" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22298%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20298%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16288dd3c83%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A15pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16288dd3c83%22%3E%3Crect%20width%3D%22298%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22110.6328125%22%20y%3D%2296.7171875%22%3ESem%20foto%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E">
                @endif
                <div class="card-body">
                    <h5 class="card-title">
                        <span>
                            {{ link_to_route('animal-edit', $title = $animal->nome, $parameters = [$animal->id], $attributes = ['class' => '']) }}
                        </span>

                        <span class="float-right">
                        @if($animal->adotado())
                            Adotado por {{ $animal->userAdocao->name }}
                        @else
                            @if(auth()->user()->hasInteresse($animal))
                                {{ link_to_route('animal-remover-interrese', $title = 'Interassado(a)', $parameters = [$animal->id], $attributes = ['class' => '']) }}
                            @else
                                {{ link_to_route('animal-marcar-interrese', $title = 'Tenho interesse', $parameters = [$animal->id], $attributes = ['class' => '']) }}
                            @endif
                        @endif
                        </span>
                    </h5>
                    <p class="card-text">
                        {{ $animal->raca->especie->nome }}
                        -
                        {{ $animal->raca->nome }}
                        -
                        {{ $animal->porte->nome }}
                        <br>
                        {{ $animal->nascimento }}
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Cadastrado por {{ $animal->userCadastro->name }}</small>
                    </p>
                    <p class="card-text">
                        {{ $animal->pessoasInteressadas->count() }} Interessado(s)
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
