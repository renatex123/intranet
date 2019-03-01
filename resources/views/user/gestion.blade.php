@extends('layouts.app')
@section('contenido')

<div class="card shadow mb-4">
            <div class="card-header py-3">
            
            </div>
            <div class="card-body">
                
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
            <th class="text-center">Rol</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Apellido</th>
            <th class="text-center">E-mail</th>
            <th class="text-center" >Imagen</th>
            <th class="text-center">Nick</th>
            <th class="text-center">Dni</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>


            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                     <td class="text-center">{{$user->role}}</td>
                    <td class="text-center">{{$user->name}}</td>
                    <td class="text-center">{{$user->surname}}</td>
                    <td class="text-center">{{$user->email}}</td>
                    <td class="text-center">
                        @if($user->foto)
                        <img src="{{route('user.avatar',['filename'=>$user->foto])}}" alt="" width="75">
                        @endif
                    </td>
                    <td class="text-center">{{$user->nick}}</td>
                    <td class="text-center">{{$user->dni}}</td>
                    <td class="text-center"><a href="" class="btn btn-success">Editar</a></td>
                    <td class="text-center"><a href="{{ route('user.destroy',$user->id) }}" class="btn btn-danger">Eliminar</a></td>

                </tr>
                @empty
            <h2>No hay datos a cargar</h2>
            @endforelse

            </tbody>

        </table>
        @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
    </div>
</div>
@endsection