@extends('layouts.app')
@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('ACTUALIZAR PERIODO') }}</div>
                <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('Periodos.update', $periodo->id) }}" >
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Periodo') }}</label>

                            <div class="col-md-8">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $periodo->nombre}}">
                            </div>

                        </div>

                          <div class="form-group row">
                        <label for="datepicker" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Inicio') }}</label>

                            <div class="col-md-8">
                                <input id="datepicker" type="text" class="form-control{{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" name="fecha_inicio" value="{{ $periodo->fecha_inicio}}">
                            </div>

                        </div>

                          <div class="form-group row">
                        <label for="datepicker2" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Termino') }}</label>

                            <div class="col-md-8">
                                <input id="datepicker2" type="text" class="form-control{{ $errors->has('fecha_final') ? ' is-invalid' : '' }}" name="fecha_final" value="{{ $periodo->fecha_final}}">
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    GUARDAR CAMBIOS
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection