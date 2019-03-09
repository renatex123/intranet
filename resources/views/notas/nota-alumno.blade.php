@extends('layouts.app')
@section('contenido')
                <div class="chart">
                  <canvas id="barChart"></canvas>
                </div>
           
<div class="container-fluid ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('NOTAS') }}</div>
                <div class="card-body"> 
                    <form id="f1" name="f1">
                               @csrf
                     @forelse($notas as $nota)
                    
                        <div class="form-group row">
                        <label  class="col-md-2 col-form-label text-md-right">{{ __('NOTA 1') }}</label>
                        <div class="col-md-2">
                        <input type="hidden" name="id" value="{{ $nota->id }}">

                        <input type="text" class="form-control{{ $errors->has('nota1') ? ' is-invalid' : '' }}" name="nota1"  value="{{ $nota->nota1 }}" maxlength="2" OnKeyUp="Sumar()" autocomplete="off" readonly>
                            @if ($errors->has('nota1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nota1') }}</strong>
                                </span>
                                @endif
                            </div>
                        <label  class="col-md-2 col-form-label text-md-right">{{ __('NOTA 5') }}</label>
                        <div class="col-md-2">
                        <input  type="text" class="form-control{{ $errors->has('nota5') ? ' is-invalid' : '' }}" name="nota5" value="{{ $nota->nota5 }}" maxlength="2" OnKeyUp="Sumar2()" autocomplete="off" readonly>
                            @if ($errors->has('nota5'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nota5') }}</strong>
                                </span>
                                @endif
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
                        <label for="nota2" class="col-md-2 col-form-label text-md-right">{{ __('NOTA 2') }}</label>

                        <div class="col-md-2">
                        <input  type="text" class="form-control{{ $errors->has('nota2') ? ' is-invalid' : '' }}" name="nota2"  value="{{ $nota->nota2 }}" maxlength="2" OnKeyUp="Sumar()" autocomplete="off" readonly>       
                                @if ($errors->has('nota2'))
                                <span class="invalid-feedback" role="alert" >
                                    <strong>{{ $errors->first('nota2') }}</strong>
                                </span>
                                @endif
                        </div>
                        <label for="nota6" class="col-md-2 col-form-label text-md-right">{{ __('NOTA 6') }}</label>
                        <div class="col-md-2">
                        <input  type="text" class="form-control{{ $errors->has('nota6') ? ' is-invalid' : '' }}" name="nota6"  value="{{ $nota->nota6 }}" maxlength="2" OnKeyUp="Sumar2()" autocomplete="off" readonly>
                         @if ($errors->has('nota6'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nota6') }}</strong>
                                </span>
                                @endif
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
                        <label  class="col-md-2 col-form-label text-md-right">{{ __('NOTA 3') }}</label>
                        <div class="col-md-2">
                        <input type="text" class="form-control{{ $errors->has('nota3') ? ' is-invalid' : '' }}" name="nota3"  value="{{ $nota->nota3 }}" maxlength="2" OnKeyUp="Sumar()" autocomplete="off" readonly>
                            @if ($errors->has('nota3'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nota3') }}</strong>
                                </span>
                                @endif
                        </div>
                        <label  class="col-md-2 col-form-label text-md-right">{{ __('NOTA 7') }}</label >
                        <div class="col-md-2">
                        <input  type="text" class="form-control{{ $errors->has('nota7') ? ' is-invalid' : '' }}" name="nota7"  value="{{ $nota->nota7 }}" maxlength="2" OnKeyUp="Sumar2()" autocomplete="off" readonly>
                            @if ($errors->has('nota7'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nota7') }}</strong>
                                </span>
                                @endif
                        </div>
                        </div>
                       
                            <div class="form-group row">
                            <label for="nota4" class="col-md-2 col-form-label text-md-right">{{ __('NOTA 4') }}</label>

                            <div class="col-md-2">
                                <input  type="text" class="form-control{{ $errors->has('nota4') ? ' is-invalid' : '' }}" name="nota4"  value="{{ $nota->nota4 }}" maxlength="2" OnKeyUp="Sumar()" autocomplete="off" readonly>
                                    @if ($errors->has('nota4'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nota4') }}</strong>
                                </span>
                                @endif
                            </div>
                            <label for="nota8" class="col-md-2 col-form-label text-md-right">{{ __('NOTA 8') }}</label>

                            <div class="col-md-2">
                                <input  type="text" class="form-control{{ $errors->has('nota8') ? ' is-invalid' : '' }}" name="nota8"  value="{{ $nota->nota8 }}" maxlength="2" OnKeyUp="Sumar2()" autocomplete="off" readonly>
                                    @if ($errors->has('nota8'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nota8') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dni" class="col-md-2 col-form-label text-md-right">{{ __('PROMEDIO FINAL') }}</label>

                            <div class="col-md-2">
                                <input  type="text" class="form-control"  name="txtresultado" value="{{$promedio1}}" readonly>
                            </div>
                            <label for="nick" class="col-md-2 col-form-label text-md-right">{{ __('PROMEDIO FINAL') }}</label>
                            <div class="col-md-2">
                                <input  type="text" class="form-control"   name="txtresultado2" value="{{$promedio2}}" readonly >
                        </div>
                    </div>
                        </form>
                        @empty
                     <h2>NO HAY DATOS</h2>
                         @endforelse
                     @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
