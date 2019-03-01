@extends('layouts.app')
@section('contenido')
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">AGREGA TU CICLO</h6>
            </div>
            <div class="card-body">
                 <a href="{{ route('Ciclos.create') }}" class="btn btn-info mb-3">Agregar Ciclo</a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
            <th class="text-center">Carrera</th>
            <th class="text-center">Curso</th>
            <th class="text-center">Ciclo</th>
            <th class="text-center">Notas</th>
            <th class="text-center">Silabus</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
            </thead>
            <tbody>
                @forelse($ciclos as $ciclo)
                <tr>
                    <td class="text-center">{{ $ciclo->carreranombre }}</td>
                    <td class="text-center">{{ $ciclo->cursonombre }}</td>
                    <td class="text-center">{{ $ciclo->ciclonombre }}</td>
                    <td class="text-center"><a href="{{ route('notas.index', $ciclo->id) }}"><i class="fas fa-pencil-alt fa-fw"></i></a></td>
                    <td class="text-center"><a href="{{ route('silabus.mostrar', $ciclo->id) }}"><i class="fas fa-pencil-alt fa-fw"></i></a></td>
                    <td class="text-center"><a href="{{ route('Ciclos.edit', $ciclo->id) }}" class="btn btn-success">Editar</a></td>
                <td class="text-center"><form action="{{ route('Ciclos.destroy', $ciclo->id) }}" method="POST">
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
