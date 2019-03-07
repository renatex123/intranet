<?php

namespace App\Http\Controllers;

Use Illuminate\Http\Response;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\File;
Use Faker\Provider\Image;
Use Illuminate\Support\Facades\Storage;
use App\User;
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

    public function update(Request $request)
    {
//pedir usuario identificado
         $id = \Auth::user()->id;

//validar request
        $validate = $this->validate($request,[
             'name' => 'required|string|max:30',
             'surname' => 'required|string|max:30',
             'email' => 'required|string|max:50|unique:users,nick,'.$id,
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
        return redirect()->route('config')->with(['message'=>'Usuario actualizado correctamente']);
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
            return view('user.editar',[
                'user' => $user
            ]);
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
             'email' => 'required|string|max:50|unique:users,nick,'.$id,
             'nick' => 'required|string|max:20',
             'dni' => 'required|string|max:9'
        ]);
        //pasar a variables
            $name = $request->input('name');
            $surname = $request->input('surname');
            $email = $request->input('email');
            $nick = $request->input('nick');
            $dni = $request->input('dni');
        // instanciar objeto de la BD
        $user = user::find($id);
        //Setear Objeto
            $user->name = $name;
            $user->surname = $surname;
            $user->email = $email;
            $user->nick = $nick;
            $user->dni = $dni;
            //seteamos la imagen

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
