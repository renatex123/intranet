@extends('layouts.app')
@section('contenido')


<div class="col-md-12 ">
      <a href="{{ route('Silabus.create') }}" class="btn btn-info mb-3">Agregar Silabus</a>
    <div class="panel-body">

        <table class="table table-bordered" id="dataTable">

            <thead>
            <th class="text-center">ID</th>
            <th class="text-center">Carrera</th>
            <th class="text-center">Curso</th>
            <th class="text-center">Ciclo</th>
            <th class="text-center">Periodo</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Archivo</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
            </thead>
            <tbody>
                @forelse($silabus as $silabu)
                <tr>
                    <td class="text-center">{{ $silabu->id }}</td>
                    <td class="text-center">{{ $silabu->CarreraSilabus->nombre }}</td>
                    <td class="text-center">{{ $silabu->CursoSilabus->nombre }}</td>
                    <td class="text-center">{{ $silabu->CicloSilabus->nombre }}</td>
                    <td class="text-center">{{ $silabu->PeriodoSilabus->nombre }}</td>
                    <td class="text-center">{{ $silabu->nombre }}</td>
                    <td class="text-center">{{ $silabu->archivo }}</td>
                    <td class="text-center"><a href="{{ route('Silabus.edit', $silabu->id) }}" class="btn btn-success">Editar</a></td>
                     <td class="text-center"><form action="{{ route('Silabus.destroy', $silabu->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">eliminar</button>
                    </form>
                    </td>
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