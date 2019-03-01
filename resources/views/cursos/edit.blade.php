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
                <div class="card-header">{{ __('ACTUALIZAR EL CURSO') }}</div>
                <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('Cursos.update', $cursos->id) }}" >
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group row">
                        <label for="carrera_id" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la Carerra') }}</label>

                            <div class="col-md-8">
                                 <select class="form-control" name="carrera_id">@forelse($carreras as $carrera)<option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>   @empty
                               <h2>No hay datos a cargar</h2>@endforelse</select>
                            </div>

                        </div>

                         <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Curso') }}</label>

                            <div class="col-md-8">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $cursos->nombre}}">
                            </div>

                        </div>

                         <div class="form-group row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion del Curso') }}</label>

                            <div class="col-md-8">
                                <textarea id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" >{{ $cursos->descripcion}}</textarea>
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