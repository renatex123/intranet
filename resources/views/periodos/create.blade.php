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
                <div class="card-header">{{ __('AGREGAR El PERIODO') }}</div>
                <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('Periodos.store') }}" >
                        @csrf
                        
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Periodo') }}</label>

                            <div class="col-md-8">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre">

                                @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                          <div class="form-group row">
                            <label for="datepicker" class="col-md-4 col-form-label text-md-right">{{ __('Fecha inicio') }}</label>

                            <div class="col-md-8">
                                <input id="datepicker" type="text" class="form-control{{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" name="fecha_inicio">

                                @if ($errors->has('fecha_inicio'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fecha_inicio') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                          <div class="form-group row">
                            <label for="datepicker" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Final') }}</label>

                            <div class="col-md-8">
                                <input id="datepicker" type="text" class="form-control{{ $errors->has('fechafinal') ? ' is-invalid' : '' }}" name="fechafinal">

                                @if ($errors->has('fechafinal'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fechafinal') }}</strong>
                                </span>
                                @endif
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