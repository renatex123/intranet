@extends('layouts.app')
@section('contenido')

<div class="card shadow mb-4">
            <div class="card-header py-3">
            
            </div>
            <div class="card-body">
                
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
            <th class="text-center">Foto</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Apellido</th>
            <th class="text-center">Carrera</th>
            <th class="text-center">Ciclo</th>
            <th class="text-center">Notas</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
            </thead>
            <tbody>
                @forelse($notas as $nota)
                <tr>
                	<td class="text-center">
                        @if($nota->notasUser->foto)
                        <img src="{{route('user.avatar',['filename'=>$nota->notasUser->foto])}}" alt="" width="75">
                        @endif
                    </td>
                    <td class="text-center">{{$nota->notasUser->name}}</td>
                    <td class="text-center">{{$nota->notasUser->surname}}</td>
                    <td class="text-center">{{$nota->notasCarrera->nombre}}</td>
                    <td class="text-center">{{$nota->notasCiclo->nombre}}</td>
                    <td class="text-center"><a href="{{ route('notas.nota-alumno', $nota->notasCiclo->id) }}"><i class="fas fa-pencil-alt fa-fw"></i></a></td>
                    <td class="text-center"><a href="" class="btn btn-success">Editar</a></td>
                    <td class="text-center"><a href="" class="btn btn-danger">Eliminar</a></td>
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
