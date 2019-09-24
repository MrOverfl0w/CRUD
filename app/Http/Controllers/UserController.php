<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'email'=>'required',
            'username'=>'required',
            'clave'=>'required'
        ]);

        //Se obtiene la imagen, y se guarda la ruta en la base de datos
        $img = $request->file('imagen');
        $username = $request->get('username');
        $path = $this->upload($img,$username);

        $user = new User([
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellido'),
            'email' => $request->get('email'),
            'username' => $request->get('username'),
            'clave' => hash('sha256',$request->get('clave')), //Se aplica cifrado a la clave
            'imagen' => $path
        ]);

        $user->save();

        return redirect('/users')->with('Success','Usuario guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'clave'=>'required'
        ]);

        $user = User::find($id);

        $clave = hash('sha256',$request->get('clave'));
        if ($user->clave == $clave){

            if (!is_null($request->get('nombre'))){
                $user->nombre =  $request->get('nombre');
            }
            if (!is_null($request->get('apellido'))){
                $user->apellido = $request->get('apellido');
            }
            if (!is_null($request->get('email'))){
                $user->email = $request->get('email');
            }
            if (!is_null($request->get('new_clave'))){
                $user->clave = hash('sha256',$request->get('new_clave'));
            }

            if ($request->hasFile('imagen')){
                $this->deleteUserFile($user->username);
                $user->imagen = $this->upload($request->get('imagen'),$user->username);
            }
            $user->save();
    
            return redirect('/users')->with('success', 'Usuario actualizado!');
        }
        return redirect('/users/'.$id.'/edit')->with('failure', 'La contraseña es incorrecta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $this->deleteUserFile($user);
        return redirect('/users')->with('success', 'Usuario borrado!');
    }

    /**
     * Download the profile image of the user, if exists.
     * 
     * @param string $path_to_image
     * @return \Illuminate\Http\Response
     */
    public function showImage(Request $request)
    {
        $storage_path = \storage_path().'/app/';
        $path_to_image = $request->get('imagen');
        $url = $storage_path . $path_to_image;
        return response()->file($url);
        if (\Storage::exists($path_to_image)){
        }
        return response()->file($storage_path . 'blank-profile.png');
    }

    private function upload($file, $username){
        $file_name = $file->getClientOriginalName();
        $path = $username . '/' . $file_name;
        \Storage::put($path, \File::get($file));
        return $path;
    }

    private function deleteUserFile($username){
        \Storage::deleteDirectory($username);
    }
}
