@extends('layouts.app')
@section('contenido')
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">AGREGA TU PERIODO ACADEMICO</h6>
            </div>
            <div class="card-body">
                 <a href="{{ route('Periodos.create') }}" class="btn btn-info mb-3">Agregar</a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
            <th class="text-center">Carrera</th>
            <th class="text-center">Curso</th>
          	<th class="text-center">Ciclo</th>
          	<th class="text-center">Periodo</th>
          	<th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
            </thead>
            <tbody>
                @forelse($registros as $registro)
                <tr>
                    <td class="text-center">{{ $registro->CarreraRegistro->nombre }}</td>
                    <td class="text-center">{{ $registro->CursoRegistro->nombre }}</td>
                    <td class="text-center">{{ $registro->CicloRegistro->nombre }}</td>
                    <td class="text-center">{{ $registro->PeriodoRegistro->nombre }}</td>
                <td class="text-center"><form action="{{ route('Periodos.destroy', $registro->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">eliminar</button>
                    </form>
                    </td>
                </tr>
                @empty
            <h2>Añade tu ciclos</h2>
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
