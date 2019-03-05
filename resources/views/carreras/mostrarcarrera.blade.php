@extends('layouts.app')
@section('contenido')

<div class="col-md-12 ">
    <div class="panel-body">

        <table class="table table-bordered" id="dataTable">

            <thead>
            <th class="text-center">Nombre del La carrera</th>
          
            <th class="text-center">Ver alumnos</th>
    
            </thead>
            <tbody>
                @forelse($carreras as $carrera)
                <tr>
                    <td class="text-center">{{ $carrera->nombre }}</td>       
    <td class="text-center"><a href="{{ route('notas.alumnosperiodos', ['periodo_id'=>$periodo_id,'carrera->id'=>$carrera->id ] ) }}" class="btn btn-success">VER</a></td>
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