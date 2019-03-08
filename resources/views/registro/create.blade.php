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
                <div class="card-header">{{ __('COMPLETA TU PERIODO ACADEMICO') }}</div>
                <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('Registros.store') }}" >
                        @csrf
                       
                          <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('CARRERA') }}</label>
                             
                            <div class="col-md-8">
                            	
                            	@foreach($carreras as $carrera)
         <input type="hidden"  class="form-control{{ $errors->has('carrera_id') ? ' is-invalid' : '' }}" name="carrera_id" autocomplete="off" readonly value="{{ $carrera->id }}">

         <input type="text"  class="form-control{{ $errors->has('carrera_id') ? ' is-invalid' : '' }}" autocomplete="off" readonly value="{{ $carrera->nombre }}">
                        		@endforeach

                                @if ($errors->has('carrera_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('carrera_id') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                         <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('PERIODO ACTUAL') }}</label>
                             
                            <div class="col-md-8">

                            	@foreach($periodos as $periodo)
             <input type="hidden"  class="form-control{{ $errors->has('periodo_id') ? ' is-invalid' : '' }}" name="periodo_id" autocomplete="off" readonly value="{{ $periodo->id }}">

             <input type="text"  class="form-control{{ $errors->has('periodo_id') ? ' is-invalid' : '' }}" autocomplete="off" readonly value="{{ $periodo->nombre }}">
                        		@endforeach

                                @if ($errors->has('periodo_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('periodo_id') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                       <div class="form-group row">
                            <label for="curso_id" class="col-md-4 col-form-label text-md-right">{{ __('SELECCIONE EL CURSO') }}</label>
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
                            <label for="ciclo_id" class="col-md-4 col-form-label text-md-right">{{ __('SELECCIONE EL CICLO') }}</label>
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