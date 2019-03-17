<?php

namespace App\Http\Controllers;

Use Illuminate\Http\Response;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\File;
Use Faker\Provider\Image;
use Illuminate\Support\Facades\Hash;
Use Illuminate\Support\Facades\Storage;
use App\User;
use App\Role;
use Auth;

class usercontroller extends Controller
{
    
    //mostrar paginas a usuarios registrados
     public function __construct()
    {
    $this->middleware('auth');
    }
     //
    public function gestion(){
        $users = User::all();
        return view('user.gestion', [
            'users' => $users
        ]);
    }

    public function config()
    {
        return view('user.config');
    }
    public function registrar()
    {
        $roles = Role::all();
        return view('user.registrar', compact("roles"));
    }

    public function create(Request $request)
    {
        
        $nombre = $request->input('name');
        $apellidos = $request->input('surname');
        $email = $request->input('email');
        $password = $request->input('password');
        $clave_carrera =$request->input('clave_carrera');
        $nick = $request->input('nick');
        $dni = $request->input('dni');
        $rol_id = $request->input('rol_id');
        // $carrera_id=$request->input('carrera_id');
        $foto = $request->file('foto');
       
        $foto_user = time().$foto->getClientOriginalName();

        Storage::disk('users')->put($foto_user, File::get($foto));

        $user = User::create([
            'name' => $nombre,
            'surname' => $apellidos,
            'email' => $email,
            'password' =>Hash::make($password),
            'clave_carrera'=>$clave_carrera,
            'nick' => $nick,
            'dni' => $dni,
            'foto' => $foto_user,
            'rol_id'=>$rol_id
            // 'carrera_id'=>$carrera_id
        

        ]);

        return redirect()->route('user.gestion')->with(['message1'=>'Usuario registrado correctamente']);

    }

    public function update(Request $request)
    {
//pedir usuario identificado
         $id = \Auth::user()->id;

//validar request
        $validate = $this->validate($request,[
             'name' => 'required |alpha|max:30',
             'surname' => 'required|alpha|max:30',
             'email' => 'required|string|max:50|unique:users,email,'.$id,
             'nick' => 'required|string|max:20',
             'dni' => 'required|string|max:9',
             'foto' => 'mimes:jpeg,bmp,png'
        ]);
//almacenar en variables
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $nick = $request->input('nick');
        $dni = $request->input('dni');

//instanciar objeto
        $user = user::find($id);
        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->nick = $nick;
        $user->dni = $dni;
// Subir la imagen
        $foto = $request-> file('foto');
        if($foto)
        {
//Poner nombre unico
        $foto_full = time().$foto->getClientOriginalName();
//Guardar la foto en la carpeta (storage/app/users)
        Storage::disk('users')->put($foto_full, File::get($foto));
//seteo el nombre del objeto
        $user->foto = $foto_full ;
        }
//guardar objeto
        $update=$user->update();
//devolver vista
        if($update)
        {
        return redirect()->route('user.gestion')->with(['message'=>'Usuario actualizado correctamente']);
        }else {
        return redirect()->route('config')->with(['message'=>'Ocurrio un problema al guardar']);
       }
    }
       

        public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file,200);
        }

        public function editar_maestro ($id){
            $user = User::find($id);
            $roles = Role::all();
            return view('user.editar',[
                'user' => $user
            ],compact('roles'));
        }
        //mostrar el perfil
        public function mostrarperfil()
        {
            return view('user.perfil', array('user'=>Auth::user()));
            return view('layouts.app', array('user'=>Auth::user()));
        }
        
        public function update_maestro(Request $request){
        //recojo variable id
            $id = $request->input('id');
        //validar datos
            $validate = $this->validate($request,[
             'name' => 'required|string|max:30',
             'surname' => 'required|string|max:30',
             'email' => 'required|string|max:50|unique:users,email,'.$id,
             'nick' => 'required|string|max:20',
             'dni' => 'required|string|max:9',
             'foto' => 'mimes:jpeg,bmp,png'
        ]);
        //pasar a variables
            $name = $request->input('name');
            $surname = $request->input('surname');
            $email = $request->input('email');
            $nick = $request->input('nick');
            $dni = $request->input('dni');
            $rol_id = $request->input('rol_id');
          
        // instanciar objeto de la BD
            $user = User::find($id);
        //Setear Objeto
            $user->name = $name;
            $user->surname = $surname;
            $user->email = $email;
            $user->nick = $nick;
            $user->dni = $dni;
            $user->rol_id = $rol_id;
            $foto = $request->file('foto');

           

            if($foto)
            {
            //Poner nombre unico
                    $foto_update = time().$foto->getClientOriginalName();
            //Guardar la foto en la carpeta (storage/app/users)
                    Storage::disk('users')->put($foto_update, File::get($foto));
            //seteo el nombre del objeto
                     $user->foto = $foto_update;
            }
        
            // guardamos objeto
                $update = $user->update();
            // redirigimos
            if($update)
            {   
                return redirect()->route('user.gestion')->with(['message'=>'Usuario actualizado correctamente']);
            }else {
                return redirect()->route('user.gestion')->with(['message'=>'Ocurrio un problema al guardar']);
            }

        }

//eliminar un registro 
        public function destroy($id)
        {
       
        $objeto =User::find($id);
            if($objeto)
            {
            $objeto->delete();
            return redirect()-> route('user.gestion')->with(['message'=>'Usuario eliminado correctamente']);
            }
            else{
            return redirect()-> route('user.gestion')->with(['message'=>'Ocurrio un error al eliminar el usuario']);
            }
        }
     
}
