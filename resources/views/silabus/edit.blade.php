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
                <div class="card-header">{{ __('ACTUALIZAR EL SILABUS') }}</div>
                <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('Silabus.update', $silabus->id) }}" >
                        @csrf
                        @method('PUT')
                        
                          <div class="form-group row">
                            <label for="carrera_id" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione la Carrera') }}</label>
                       <div class="col-md-8">
                        
         <select class="form-control" name="carrera_id">@forelse($carreras as $carrera)<option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>   @empty
                               <h2>No hay datos a cargar</h2>@endforelse</select>
                    
                                @if ($errors->has('carrera_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('carrera_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="curso_id" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione el Curso') }}</label>
                       <div class="col-md-8">
                        
            <select class="form-control" name="curso_id">@forelse($cursos as $curso)<option value="{{ $curso->id }}">{{ $curso->nombre }}</option>   @empty
                               <h2>No hay datos a cargar</h2>@endforelse</select>
                    
                                @if ($errors->has('curso_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('curso_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ciclo_id" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione el Ciclo') }}</label>
                       <div class="col-md-8">
                        
                          <select class="form-control" name="ciclo_id">@forelse($ciclos as $ciclo)<option value="{{ $ciclo->id }}">{{ $ciclo->nombre }}</option>   @empty
                               <h2>No hay datos a cargar</h2>@endforelse</select>
                    
                                @if ($errors->has('ciclo_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ciclo_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="periodo_id" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione el Periodo') }}</label>
                       <div class="col-md-8">
                        
                          <select class="form-control" name="periodo_id">@forelse($periodos as $periodo)<option value="{{ $periodo->id }}">{{ $periodo->nombre }}</option>   @empty
                               <h2>No hay datos a cargar</h2>@endforelse</select>
                    
                                @if ($errors->has('periodo_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('periodo_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Silabus') }}</label>

                            <div class="col-md-8">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" autocomplete="off" value="{{ $silabus->nombre }}">

                                @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                           <div class="form-group row">
                            <label for="archivo" class="col-md-4 col-form-label text-md-right">{{ __('SUbe tu archivo') }}</label>

                            <div class="col-md-8">
                                <input id="archivo" type="file" class="form-control{{ $errors->has('archivo') ? ' is-invalid' : '' }}" name="archivo">

                                @if ($errors->has('archivo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('archivo') }}</strong>
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