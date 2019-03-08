@extends('layouts.app')
@section('contenido')
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">AGREGA TU PERIODO ACADEMICO</h6>
            </div>
            <div class="card-body">
                 <a href="{{ route('Registros.create') }}" class="btn btn-info mb-3">Agregar</a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
            <th class="text-center">Carrera</th>
            <th class="text-center">Curso</th>
          	<th class="text-center">Ciclo</th>
          	<th class="text-center">Periodo</th>
            <th class="text-center">Notas</th>
            <th class="text-center">Asistencia</th>
            <th class="text-center">Silabus</th>
          	<th class="text-center">Editar</th>
            
            </thead>
            <tbody>
                @forelse($registros as $registro)
                <tr>
                    <td class="text-center">{{ $registro->CarreraRegistro->nombre }}</td>
                    <td class="text-center">{{ $registro->CursoRegistro->nombre }}</td>
                    <td class="text-center">{{ $registro->CicloRegistro->nombre }}</td>
                    <td class="text-center">{{ $registro->PeriodoRegistro->nombre }}</td>
                    <td class="text-center"><a href="{{ route('Periodos.destroy', $registro->id) }}"><i class="fas fa-pencil-alt fa-fw"></i></a></td>
                    <td class="text-center"><a href="{{ route('Periodos.destroy', $registro->id) }}"><i class="fas fa-pencil-alt fa-fw"></i></a></td>
                
                <td class="text-center"><a href="{{ route('Silabus.mostrar', 
                [ 'registro->CarreraRegistro->id' => $registro->CarreraRegistro->id, 'registro->CursoRegistro->id' => $registro->CursoRegistro->id
                , 'registro->CicloRegistro->id' => $registro->CicloRegistro->id, 'registro->PeriodoRegistro->id' => $registro->PeriodoRegistro->id]) }}"><i class="fas fa-pencil-alt fa-fw"></i></a></td>
                    <td class="text-center"><a href="{{ route('Periodos.destroy', $registro->id) }}"></a></td>
                </tr>
                @empty
            <h2>Añade tu Tus registros</h2>
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
</div>
@endsection
