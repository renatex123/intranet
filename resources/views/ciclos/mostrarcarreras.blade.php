@extends('layouts.app')
@section('contenido')
                 
         <div class="card shadow mb-4">
          
                
            <div class="card-body">
              <div class="table-responsive">
                 
                <table class="table table-bordered " width="100%" >

                   <thead>
                    <tr>
                        <th class="text-center">Carreras</th>
                     <th class="text-center">Notas y Asistencia</th>
                     </tr>
                  </thead>
                <tbody>
                        @foreach($carreras as $carrera)
                <tr>
                    <td class="text-center">{{ $carrera->nombre}}</td>
                    <td class="text-center"><a href="{{ route('ciclos.mostrarestudiantes', $carrera->id) }}" class="btn btn-success">VER</a></td>    
                    
                </tr>
               
                 @endforeach
                </tbody>
                </table>
                
              </div>
            </div>
             
                 
          </div>

    
@endsection
