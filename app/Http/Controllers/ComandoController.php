<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comando;
use App\Models\Subcomando;
use Illuminate\Support\Str;

class ComandoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $comandos = Comando::orderBy('nombre','ASC')->paginate(25);
        return view('comando.listado',["comandos" => $comandos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retonar comandos padre
        //Buscando primero los comandos padre
        //$comandos_padre = Comando::where('tipo_comando','=','GRUPAL');
        $comandos_padre = Comando::all()->where('tipo_comando','=','GRUPAL');
        //echo json_encode($comandos_padre);die();
        return view('comando.crear',['comandos_padre'=>$comandos_padre]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardando el comando 
        //Por ahora  solo intentaré guardar solo comandos normales
        $validacion = Validator::make($request->all(),[
            'nombre_comando' => 'required|max:60',
            'descripcion' => 'required|max:255', 
            'tipo_comando' => 'required|in:NORMAL,GRUPAL,SUBCOMANDO',
            'respuesta' =>'required',
        ]);
        $ruta_archivo = "";
        if($request->tipo_respuesta == 'ARCHIVO'){
            $archivo_guardar = $request->file('archivo_respuesta');
            if($archivo_guardar == null) {
                $validacion->errors()->add('archivo_respuesta', 'Por favor selecciona un archivo.');
            }else{
                if ($archivo_guardar->getSize() <= 0) {
                    $validacion->errors()->add('archivo_respuesta', 'Por favor selecciona un archivo.');
                    //return redirect()->route('comando.create')->withErrors($validacion)->withInput();
    
                    //$request->session()->flash('mensaje','No se ha podido registrar, porque el archivo no fue ingresado.');
                }else{
                    //Guardar el archivo
                    //$titulo_archivo = $archivo_guardar->getClientOriginalName();
                    $titulo_nuevo = "PEDRO_BOT" . rand(). "-" .$archivo_guardar->getClientOriginalName();
                    $archivo_guardar->storeAs("public/" . config('chatify.attachments.folder'), $titulo_nuevo);
                    $ruta_archivo = $titulo_nuevo;
                }
            }
        }else{
            //Guardar normal, creo
            $ruta_archivo = 'NULL';
        }

        if($request->tipo_comando == 'SUBCOMANDO'){
            if($request->input('comando_padre') == 'no_select'){
                $validacion->errors()->add('comando_padre', 'Debes seleccionar un comando padre.');
                return redirect()->route('comando.create')->withErrors($validacion)->withInput();
            }else{
                //Agregando un subcomando 
                $subcomando = new Subcomando();
                $subcomando->tipo_respuesta = $request->input('tipo_respuesta');
                $subcomando->nombre = '/' . $request->input('nombre_comando');
                $subcomando->comando_padre = $request->input('comando_padre'); //El ID del comando padre quedará guardado acá
                $subcomando->respuesta = $request->input('respuesta');
                $subcomando->ruta_archivo = $ruta_archivo;
                $subcomando->descripcion = $request->input('descripcion');
                $subcomando->save();
                //echo json_encode($subcomando);die();
            }
        }
        //Este if es por si detecta errores
        if($validacion->fails()){
            return redirect()->route('comando.create')->withErrors($validacion)->withInput();
        }
        //En caso no detecte ningún error, agregaremos a la bd de
        /*$persona = new Persona();
        $persona->apellido_paterno = $request->input('apellido_paterno');
        $persona->apellido_materno = $request->input('apellido_materno');
        $persona->nombres = $request->input('nombres');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        $persona->peso = $request->input('peso');
        $persona->dni = $request->input('DNI');
        $persona->estado_civil = $request->input('estado_civil');*/
        
        //$persona->save();
        $comando = new Comando();
        $comando->nombre = "/".$request->input('nombre_comando');
        $comando->tipo_comando = $request->input('tipo_comando');
        $comando->descripcion = $request->input('descripcion');
        $comando->ruta_archivo = $ruta_archivo; 
        $comando->tipo_respuesta = $request->input('tipo_respuesta');
        $comando->respuesta = $request->input('respuesta');
        //Viendo si la respuesta tiene un link
        $respuesta_con_links= preg_replace("/((http|https|www)[^\s]+)/", '<a target=”_blank” href="$1">$0</a>', $comando->respuesta);
        //miro si hay enlaces con solamente www, si es así le añado el https://
        $respuesta_con_links= preg_replace("/href=\"www/", 'href="https://www', $respuesta_con_links);
        $comando->respuesta = $respuesta_con_links;

        $comando->save();

        //Sesiones flash
        $request->session()->flash('mensaje','Se ha registrado correctamente');
        return redirect()->route('comando.index');
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
    public function edit(Comando $comando)
    {
        return view('comando.edit', compact('comando'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Comando $comando)
    {
        $comando->nombre = "/".$request->input('nombre_comando');
        $comando->tipo_comando = $request->input('tipo_comando');
        $comando->descripcion = $request->input('descripcion');
        $comando->respuesta = $request->input('respuesta');

        $comando->save();

        //Sesiones flash
        $request->session()->flash('mensaje','Se ha actualizado correctamente');
        return redirect()->route('comando.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comando $comando)
    {
        $comando->delete();
        return redirect()->route('comando.index');
    }
}
