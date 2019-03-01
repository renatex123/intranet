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
                <div class="card-header">{{ __('AGREGAR EL CICLO') }}</div>
                <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('Ciclos.store') }}" >
                        @csrf
                        
                         <input id="user_id" type="hidden" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" value="{{ Auth::user()->id }}" name="user_id">

                        <div class="form-group row">
                            <label for="carrera_id" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Carrera') }}</label>

                            <div class="col-md-8">
                               <select class="form-control" name="carrera_id">@forelse($carreras as $carrera)<option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>   @empty
                               <h2>No hay datos a cargar</h2>@endforelse</select>
                    
                                @if ($errors->has('carrera_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('carrera_id') }}</strong>
                                </span>
                                @endif
                            </div></div>

                             <div class="form-group row">
                            <label for="curso_id" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Curso') }}</label>

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
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione el El Ciclo') }}</label>
                       <div class="col-md-8">
                        
            <select class="form-control" name="nombre"><option value="III">III</option><option value="IV">IV</option><option value="V">V</option></select>
                    
                                @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
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