@extends('layouts.app')
@section('contenido')            
                          
         <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" >
                   <thead> 
                   <h1>ALUMNOS DEL III CICLO</h1>    
                    <tr>
                        <th class="text-center">Alumno</th>
                     	<th class="text-center">Ciclo</th>
                     	<th class="text-center">Notas</th>
                     	<th class="text-center">Asistencia</th>
                     </tr>
                  </thead>
                <tbody>
                     @foreach($notas as $nota)
                @if($nota->notasCiclo->nombre == "III")  
                <tr>
            <td class="text-center">{{ $nota->notasUser->name }}</td>
            <td class="text-center">{{ $nota->notasCiclo->nombre }}</td>
            <td class="text-center"><a href="{{ route('notas.alumnoadmin', $nota->ciclo_id) }}" class="btn btn-success">VER</a></td>  <td class="text-center"><a href="" class="btn btn-success">VER</a></td>      
                </tr> 
                 @endif
                @endforeach
                </tbody>
                </table>   
              </div>
            </div>     
          </div>


             <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" >
                   <thead> 
                   <h1>ALUMNOS DEL IV CICLO</h1>    
                    <tr>
                        <th class="text-center">Alumno</th>
                      <th class="text-center">Ciclo</th>
                      <th class="text-center">Notas</th>
                      <th class="text-center">Asistencia</th>
                     </tr>
                  </thead>
                <tbody>
                     @foreach($notas as $nota)
                @if($nota->notasCiclo->nombre == "IV")  
                <tr>
            <td class="text-center">{{ $nota->notasUser->name }}</td>
            <td class="text-center">{{ $nota->notasCiclo->nombre }}</td>
            <td class="text-center"><a href="{{ route('notas.alumnoadmin', $nota->ciclo_id) }}" class="btn btn-success">VER</a></td>  <td class="text-center"><a href="" class="btn btn-success">VER</a></td>      
                </tr> 
                 @endif
                @endforeach
                </tbody>
                </table>   
              </div>
            </div>     
          </div>

           <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" >
                   <thead> 
                   <h1>ALUMNOS DEL V CICLO</h1>    
                    <tr>
                        <th class="text-center">Alumno</th>
                      <th class="text-center">Ciclo</th>
                      <th class="text-center">Notas</th>
                      <th class="text-center">Asistencia</th>
                     </tr>
                  </thead>
                <tbody>
                     @foreach($notas as $nota)
                @if($nota->notasCiclo->nombre == "V")  
                <tr>
            <td class="text-center">{{ $nota->notasUser->name }}</td>
            <td class="text-center">{{ $nota->notasCiclo->nombre }}</td>
            <td class="text-center"><a href="{{ route('notas.alumnoadmin', $nota->ciclo_id) }}" class="btn btn-success">VER</a></td>  <td class="text-center"><a href="" class="btn btn-success">VER</a></td>      
                </tr> 
                 @endif
                @endforeach
                </tbody>
                </table>   
              </div>
            </div>     
          </div>

@endsection
