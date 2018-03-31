@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Filtros
        </div>
        <div class="card-body">
            {{ Form::open(['route' => 'user-index', 'method' => 'GET', 'class' => 'form']) }}

            <div class="row">
                <div class="col col-md-4">
                    {{ Form::label('name', 'Nome', ['class' => 'control-label']) }}
                    {{ Form::text('name', old('name', null), ['class' => 'form-control']) }}
                </div>
            </div>

            <div style="float: right;">
                {{ link_to_route('user-index', $title = 'Limpar', $parameters = [], $attributes = ['class' => 'btn']) }}
                {{ Form::submit('Buscar', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
    <br>
    <div class="row card-columns">
        @foreach($users as $user)
            <div class="col col-md-4">
                <div class="card">
                    <div class="card-header">
                        {{ $user->name }}
                    </div>
                    <div class="card-body">
                        {{ $user->email }}
                        <br>
                        {{ $user->animaisInteressados->count() }} Interesse(s)
                        <br>
                        {{ $user->animaisAdotados->count() }} adoção(ões)
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
