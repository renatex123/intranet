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
            <div class="card-body">

                <form method="POST" action="{{ route('Ciclos.store') }}" name="formulario" >
                @csrf
                        
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