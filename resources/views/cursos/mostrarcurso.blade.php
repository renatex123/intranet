@extends('layouts.app')
@section('contenido')

<div class="col-md-12 ">
    <div class="panel-body">

        <table class="table table-bordered" id="dataTable">

            <thead>
            <th class="text-center">Nombre del Curso</th>
            <th class="text-center">Nombre de la Carrera</th>
            <th class="text-center">Ver alumnos</th>
           
            </thead>
            <tbody>
                @forelse($cursos as $curso)
                <tr>
                    <td class="text-center">{{ $curso->nombre }}</td>
                    <td class="text-center">{{ $curso->CarreraCurso->nombre }}</td>
              
                    <td class="text-center"><a href="{{ route('cursos.mostrarcurso', $periodo->id, $curso->nombre) }}" class="btn btn-success">VER</a></td>
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