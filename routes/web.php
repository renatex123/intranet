<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

route::get('/user/editar/{id}', 'usercontroller@editar_maestro')->name('user.editar');
Route::post('/user/update_maestro','usercontroller@update_maestro')->name('user.update_maestro');
Route::post('/user/update','usercontroller@update')->name('user.update');
route::get('/user/gestion','usercontroller@gestion')->name('user.gestion');
Route::post('/user/avatar/{filename}','usercontroller@getImage')->name('user.avatar');
Route::get('/configuracion','usercontroller@config')->name('config');
Route::get('/perfil','usercontroller@mostrarperfil')->name('perfil');
Route::get('/user/{id}/destroy','usercontroller@destroy')->name('user.destroy');
Route::get('/user/avatar/{filename}','usercontroller@getImage')->name('user.avatar');
Route::get('/user/avatar/{filename}', 'usercontroller@getImage')->name('user.avatar');


//crud de Carreras
Route::resource('Carreras','CarreraController');
//crud de Periodos
Route::resource('Periodos','PeriodoController');
//crud de Cursos
Route::resource('Cursos','CursoController');
//crud de Silabus
Route::resource('Silabus','SilabusController');
Route::get('/Silabus/{id}/mostrar','SilabusController@mostrar')->name('silabus.mostrar');
//crud de Documentos
Route::resource('Documentos','DocumentoController');
//crud de ciclos
Route::resource('Ciclos','CicloController');
//ADMIN
Route::get('Mostrar/Carreras','CarreraController@vercarreraadmin')->name('ciclos.mostrarciclocarreras');
Route::get('Carrera/Estudiantes/{id}','NotaController@veralumnoadmin')->name('ciclos.mostrarestudiantes');
Route::get('Estudiantes/{id}/Notas','NotaController@notasid')->name('notas.alumnoadmin');

//Pestaña Peridos todas la rutas 
Route::get('Periodo/alumnos/{id}/{id2}','NotaController@alumnosperiodos')->name('notas.alumnosperiodos');
Route::get('Periodo/Carreras','PeriodoController@mostrarperiodos')->name('periodos.mostrarperiodo');
Route::get('Periodo/Curso/Carreras/{id}','CursoController@mostrarcurso')->name('cursos.mostrarcurso');

//crud Notas
Route::get('Notas/{id}/index','NotaController@index')->name('notas.index');
Route::get('Notas/{id}/nota-alumno','NotaController@notasid')->name('notas.nota-alumno');
Route::post('Notas/nota-alumno','NotaController@editarnotas')->name('notas.editarnotas');


