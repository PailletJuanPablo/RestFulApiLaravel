<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fabricante;
Use App\Vehiculo;
class FabricanteController extends Controller
{


    public function __construct(){
        $this->middleware('auth.basic',['only'=>['store','update','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
return response()->json(['datos'=>Fabricante::all()],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'Mostrando el controlador para crear';
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->input('nombre') || !$request->input('telefono')){
            return response()->json(['mensaje'=>'no se pudo insertar','codigo'=>422],422); 
            
        }
      //  return response()->json(['datos'=>Fabricante::all()],201);
      Fabricante::create($request->all());
      
      return response()->json(['mensaje'=>'fabricante insertado'],201); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
$fabricante = Fabricante::find($id);
if (!$fabricante){
    return response()->json(['mensaje'=>'No se encontró el fabricante','codigo'=>404],404);
}
    return response()->json(['datos'=>$fabricante],200);
    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'editando el id '.$id;
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
        $metodo=$request->method();
$fabricante = Fabricante::find($id);

if(!$fabricante){
    return response()->json(['mensaje'=>'No se encontró el fabricante','codigo'=>404],404);
    
}
        if($metodo==='PATCH'){

$nombre = $request->input('nombre');
if($nombre!=null || $nombre!=''){
    $fabricante->nombre=$nombre;
    
}

$telefono = $request->input('telefono');
if($telefono!=null || $telefono!=''){
    $fabricante->telefono=$telefono;
}

$fabricante->save();



return response()->json(['mensaje'=>'Actualizado Correctamente','codigo'=>201],201);
}else{
    $nombre=$request->input('nombre');
    $telefono=$request->input('telefono');

    if(!$nombre || !$telefono){
        return response()->json(['mensaje'=>'Datos Incorrectos','codigo'=>404],404);
        
    }
    
$fabricante->nombre=$nombre;
$fabricante->telefono=$telefono;

$fabricante->save();
return response()->json(['mensaje'=>'Actualizado Correctamente','codigo'=>201],201);

        }
            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
