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
                <div class="card-header">{{ __('AGREGAR LA CARRERA') }}</div>
                <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('Carreras.store') }}" >
                        @csrf
                        
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Carrera') }}</label>

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
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                            <div class="col-md-8">
                                <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion">

                                @if ($errors->has('descripcion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                          <div class="form-group row">
                            <label for="clave_carrera" class="col-md-4 col-form-label text-md-right">{{ __('Clave Carrera') }}</label>

                            <div class="col-md-8">
                                <input id="clave_carrera" type="text" class="form-control{{ $errors->has('clave_carrera') ? ' is-invalid' : '' }}" name="clave_carrera">

                                @if ($errors->has('clave_carrera'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('clave_carrera') }}</strong>
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