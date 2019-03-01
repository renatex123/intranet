
@extends('layouts.app')
@section('contenido')
<div class="col-md-12 ">
      <a href="{{ route('Carreras.create') }}" class="btn btn-info mb-3">Agregar Carrera</a>
    <div class="panel-body">

        <table class="table table-bordered" id="dataTable">

            <thead>
            <th class="text-center">ID</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
            </thead>
            <tbody>
                @forelse($carreras as $carrera)
                <tr>
                    <td class="text-center">{{ $carrera->id }}</td>
                    <td class="text-center">{{ $carrera->nombre }}</td>
                    <td class="text-center"><a href="{{ route('Carreras.edit', $carrera->id) }}" class="btn btn-success">Editar</a></td>
                    
                <td class="text-center"><form action="{{ route('Carreras.destroy', $carrera->id) }}" method="POST">
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
