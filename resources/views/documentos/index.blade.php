@extends('layouts.app')
@section('contenido')


<div class="col-md-12 ">
      <a href="{{ route('Documentos.create') }}" class="btn btn-info mb-3">Agregar Documentos</a>
    <div class="panel-body">

        <table class="table table-bordered" id="dataTable">

            <thead>
            <th class="text-center">ID</th>
            <th class="text-center">Carrera</th>
            <th class="text-center">Curso</th>
            <th class="text-center">Ciclo</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Archivo</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
            </thead>
            <tbody>
                @forelse($documentos as $documento)
                <tr>
                    <td class="text-center">{{ $documento->id }}</td>
                    <td class="text-center">{{ $documento->CarreraDocumento->nombre }}</td>
                    <td class="text-center">{{ $documento->CursoDocumento->nombre }}</td>
                    <td class="text-center">{{ $documento->CicloDocumento->nombre }}</td>
                    <td class="text-center">{{ $documento->nombre }}</td>
                    <td class="text-center">{{ $documento->archivo }}</td>
                    <td class="text-center"><a href="{{ route('Documentos.edit', $documento->id) }}" class="btn btn-success">Editar</a></td>
                     <td class="text-center"><form action="{{ route('Documentos.destroy', $documento->id) }}" method="POST">
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