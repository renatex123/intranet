@extends('layouts.app')
@section('contenido')

<div class="col-md-12 ">
    <div class="panel-body">

        <table class="table table-bordered" id="dataTable">

            <thead>
            <th class="text-center">Nombre Del alumnos</th>
            <th class="text-center">Ver Notas</th>
    
            </thead>
            <tbody>
                @forelse($alumnos as $alumno)
                <tr>
                    <td class="text-center">{{ $alumno->notasUser->name}} {{$alumno->notasUser->surname}}</td>
          
              
    <td class="text-center"><a href="{{ route('notas.nota-alumno', $alumno->ciclo_id) }}" class="btn btn-success">VER</a></td>
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