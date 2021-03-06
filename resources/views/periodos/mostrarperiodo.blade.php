@extends('layouts.app')
@section('contenido')

<div class="col-md-12 ">
    <div class="panel-body">

        <table class="table table-bordered" id="dataTable">

            <thead>
            <th class="text-center">ID</th>
            <th class="text-center">Nombre del Periodo</th>
            <th class="text-center">Fecha Inicio</th>
            <th class="text-center">Fecha Termino</th>
            <th class="text-center">Mostrar</th>
           
            </thead>
            <tbody>
                @forelse($periodos as $periodo)
                <tr>
                    <td class="text-center">{{ $periodo->id }}</td>
                    <td class="text-center">{{ $periodo->nombre }}</td>
                    <td class="text-center">{{ $periodo->fecha_inicio }}</td>
                    <td class="text-center">{{ $periodo->fechafinal }}</td>
                    <td class="text-center"><a href="{{ route('carreras.mostrarcarrera', $periodo->id) }}" class="btn btn-success">VER</a></td>
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