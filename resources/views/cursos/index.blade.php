@extends('layouts.app')
@section('contenido')

<div class="col-md-12 ">
      <a href="{{ route('Cursos.create') }}" class="btn btn-info mb-3">Agregar Curso</a>
    <div class="panel-body">

        <table class="table table-bordered" id="dataTable">

            <thead>
            <th class="text-center">ID</th>
            <th class="text-center">Carrera</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Descripcion</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
            </thead>
            <tbody>
                @forelse($cursos as $curso)
                <tr>
                    <td class="text-center">{{ $curso->id }}</td>
                    <td class="text-center">{{ $curso->CarreraCurso->nombre }}</td>
                    <td class="text-center">{{ $curso->nombre }}</td>
                    <td class="text-center">{{ $curso->descripcion }}</td>
                    <td class="text-center"><a href="{{ route('Cursos.edit', $curso->id) }}" class="btn btn-success">Editar</a></td>
                    
                    <td class="text-center"><form action="{{ route('Cursos.destroy', $curso->id) }}" method="POST">
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