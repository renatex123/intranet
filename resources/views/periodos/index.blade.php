@extends('layouts.app')
@section('contenido')


<div class="col-md-12 ">
      <a href="{{ route('Periodos.create') }}" class="btn btn-info mb-3">Agregar Periodo</a>
    <div class="panel-body">

        <table class="table table-bordered" id="dataTable">

            <thead>
            <th class="text-center">ID</th>
            <th class="text-center">Nombre del Periodo</th>
            <th class="text-center">Fecha Inicio</th>
            <th class="text-center">Fecha Termino</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
            </thead>
            <tbody>
                @forelse($periodos as $periodo)
                <tr>
                    <td class="text-center">{{ $periodo->id }}</td>
                    <td class="text-center">{{ $periodo->nombre }}</td>
                    <td class="text-center">{{ $periodo->fecha_inicio }}</td>
                    <td class="text-center">{{ $periodo->fechafinal }}</td>
                    <td class="text-center"><a href="{{ route('Periodos.edit', $periodo->id) }}" class="btn btn-success">Editar</a></td>
                     <td class="text-center"><form action="{{ route('Periodos.destroy', $periodo->id) }}" method="POST">
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