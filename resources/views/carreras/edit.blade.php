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
                <div class="card-header">{{ __('ACTUALIZAR LA CARRERA') }}</div>
                <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('Carreras.update', $carrera->id) }}" >
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Carrera') }}</label>

                            <div class="col-md-8">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $carrera->nombre}}">
                            </div>

                        </div>


                        <div class="form-group row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                            <div class="col-md-8">
                                <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ $carrera->descripcion}}">
                            </div>

                        </div>


                        <div class="form-group row">
                        <label for="clave_carrera" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Carrera') }}</label>

                            <div class="col-md-8">
                                <input id="clave_carrera" type="text" class="form-control{{ $errors->has('clave_carrera') ? ' is-invalid' : '' }}" name="clave_carrera" value="{{ $carrera->clave_carrera}}">
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