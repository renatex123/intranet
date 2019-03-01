@extends('layouts.app')
@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Perfil Del Usuario') }}</div>

                <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" readonly >
                             
                            </div>
                             <label for="surname" class="col-md-2 col-form-label text-md-right">{{ __('Apellidos') }}</label>
                            <div class="col-md-4">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ Auth::user()->surname  }}" readonly >
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="dni" class="col-md-2 col-form-label text-md-right">{{ __('Dni') }}</label>

                            <div class="col-md-4">
                                <input id="dni" type="text" class="form-control" name="dni" value="{{ Auth::user()->dni  }}" readonly >      
                            </div>
                             <label for="nick" class="col-md-2 col-form-label text-md-right">{{ __('Nickname') }}</label>

                            <div class="col-md-4">
                                <input id="nick" type="text" class="form-control" name="nick" value="{{ Auth::user()->nick  }}" readonly >                             
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                            </div>
                        </div>

                          <div class="form-group row">
                          @if(Auth::user()->foto)
                          <img src="{{Route('user.avatar', ['filename'=>$user->foto])}}"/>
                          @else
                          <h2>no pasa nada</h2>
                          @endif
                            <div class="col-md-12">
                               
                            </div>
                        </div>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection