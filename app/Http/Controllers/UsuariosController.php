<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios']=Usuarios::paginate(5);
        return view('usuarios.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $campos=[
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Direccion' => 'required|string|max:200',
            'Telefono' => 'required|int|max:9999999999',
            'NumeroTarjeta' => 'required|int|max:9999999999999999',
            'Banco' => 'required|string|max:100',
            'Correo' => 'required|email',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request, $campos, $Mensaje);

        //$datosUsuario = request()->all();

        $datosUsuario = request()->except('_token');

        if($request -> hasFile('Foto')){
            $datosUsuario['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Usuarios::insert( $datosUsuario);

        //return response()->json($datosUsuario);
        return redirect('usuarios')->with('Mensaje','Usuario agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $usuario = Usuarios::findOrFail($id);

       return view('usuarios.edit',compact('usuario'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Direccion' => 'required|string|max:200',
            'Telefono' => 'required|int|max:9999999999',
            'NumeroTarjeta' => 'required|int|max:9999999999999999',
            'Banco' => 'required|string|max:100',
            'Correo' => 'required|email',
           
        ];

        if($request -> hasFile('Foto')){
             $campos+=['Foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
        }
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request, $campos, $Mensaje);

        $datosUsuario = request()->except(['_token','_method']);

        if($request -> hasFile('Foto')){

            $usuario = Usuarios::findOrFail($id);

            Storage::delete('public/'.$usuario->Foto);

            $datosUsuario['Foto']=$request->file('Foto')->store('uploads','public');
        }


        Usuarios::where('id','=',$id)->update($datosUsuario);

        //$usuario = Usuarios::findOrFail($id);

        //return view('usuarios.edit',compact('usuario'));
        return redirect('usuarios')->with('Mensaje','Usuario modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuarios::findOrFail($id);

        if(Storage::delete('public/'.$usuario->Foto)){
            Usuarios::destroy($id);
        }

       

        //return redirect('usuarios');
        return redirect('usuarios')->with('Mensaje','Usuario eliminado');

    }
}
