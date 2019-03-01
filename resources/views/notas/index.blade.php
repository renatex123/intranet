@extends('layouts.app')
@section('contenido')

<div class="container-fluid ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('NOTAS') }}</div>
                <div class="card-body"> 
                     @forelse($notas as $nota)
                        <div class="form-group row">
                            <label  class="col-md-2 col-form-label text-md-right">{{ __('NOTA 1') }}</label>
                         <div class="col-md-2">
                        <input type="text" class="form-control"  value="{{ $nota->nota1 }}" readonly>
                        </div>
                        <label  class="col-md-2 col-form-label text-md-right">{{ __('NOTA 2') }}</label>
                        <div class="col-md-2">
                        <input  type="text" class="form-control"  value="{{ $nota->nota2 }}" readonly>
                        </div>
                        <label  class="col-md-2 col-form-label text-md-right">{{ __('ESTADO NOTA') }}</label>
                        <div class="col-md-2">
                        @if( $nota->estado_nota  == 1 )
                        <input type="text" class="form-control" value="APROBADO" readonly></font>
                        @else
                        <input type="text" class="form-control" value="DESAPROBADO" readonly></font>  
                        @endif
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="dni" class="col-md-2 col-form-label text-md-right">{{ __('NOTA 3') }}</label>

                        <div class="col-md-2">
                        <input  type="text" class="form-control"  value="{{ $nota->nota3 }}" readonly>   
                        </div>
                        <label for="nick" class="col-md-2 col-form-label text-md-right">{{ __('NOTA 4') }}</label>

                        <div class="col-md-2">
                        <input  type="text" class="form-control"  value="{{ $nota->nota4 }}" readonly>
                        </div>
                        <label  class="col-md-2 col-form-label text-md-right">{{ __('ESTADO PERIODO') }}</label>
                        <div class="col-md-2">
                        @if( $nota->estado_periodo  == 1 )
                        <input  type="text" class="form-control"  value="ACTIVO" readonly>
                        @else
                        <input  type="text" class="form-control"  value="INACTIVO" readonly>  
                        @endif
                        </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-md-2 col-form-label text-md-right">{{ __('NOTA 5') }}</label>

                         <div class="col-md-2">
                        <input type="text" class="form-control"  value="{{ $nota->nota5 }}" readonly>
                        </div>

                        <label  class="col-md-2 col-form-label text-md-right">{{ __('NOTA 6') }}</label >

                        <div class="col-md-2">
                        <input  type="text" class="form-control"  value="{{ $nota->nota6 }}" readonly>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="dni" class="col-md-2 col-form-label text-md-right">{{ __('NOTA 7') }}</label>

                            <div class="col-md-2">
                                <input  type="text" class="form-control"  value="{{ $nota->nota7 }}" readonly>
                            </div>
                            <label for="nick" class="col-md-2 col-form-label text-md-right">{{ __('NOTA 8') }}</label>

                            <div class="col-md-2">
                                <input  type="text" class="form-control"  value="{{ $nota->nota8 }}" readonly>
                            </div>
                        </div>
                        @empty
                     <h2>NO HAY DATOS</h2>
                         @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
        @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
@endsection
