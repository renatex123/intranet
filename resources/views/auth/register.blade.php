@extends('layouts.ingreso')
@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block"><img src="img/cueto.jpg" width="100%" height="100%"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Registrate</h1>
              </div>
               <form method="POST" action="{{ route('register') }}">
                        @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
            <input id="name" type="text" class="form-control form-control-user{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nombres..." required autofocus >

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <div class="col-sm-6">
            <input id="surname" type="text" class="form-control form-control-user{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" placeholder="Apellidos.." required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>

                 <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
            <input id="dni" type="text" class="form-control form-control-user{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" value="{{ old('dni') }}" placeholder="Dni..." required autofocus >

                                @if ($errors->has('dni'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <div class="col-sm-6">
            <input id="nick" type="text" class="form-control form-control-user{{ $errors->has('nick') ? ' is-invalid' : '' }}" name="nick" value="{{ old('nick') }}" placeholder="Nickname.." required autofocus>

                                @if ($errors->has('nick'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nick') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>

                <div class="form-group">
              <input id="email" type="email" class="form-control form-control-user{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail.." required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="password" type="password" class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <div class="col-sm-6">
                 <input id="password2" type="password" class="form-control form-control-user" name="password2" placeholder="Repeat Password" required>
                  </div>
                </div>

                 <div class="form-group">
              <input id="clave_carrera" type="password" class="form-control form-control-user{{ $errors->has('clave_carrera') ? ' is-invalid' : '' }}" name="clave_carrera" value="{{ old('clave_carrera') }}" placeholder="Clave cueto.." required autofocus >

                                @if ($errors->has('clave_carrera'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('clave_carrera') }}</strong>
                                    </span>
                                @endif
                </div>

                   <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('REGISTRAR') }}
                  </button>
                <hr>
              </form>
              <hr>
               <div class="text-center">
                    <a class="small" href="{{ route('login') }}">Logueate</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{ route('register') }}">Registrate</a>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
