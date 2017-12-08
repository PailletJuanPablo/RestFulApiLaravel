<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fabricante;
use App\Vehiculo;
class FabricanteVehiculoController extends Controller
{


    public function __construct(){
        $this->middleware('auth.basic',['only'=>['store','update','destroy']]);
    }

 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
$fabricante = Fabricante::find($id);
if (!$fabricante){
    return response()->json(['mensaje'=>'No se encontró el fabricante','codigo'=>404],404);
}
return response()->json(['datos'=>$fabricante->vehiculos()->get()],200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
//color
//cilindraje
//potencia
//peso

if(!$request->input('color') || !$request->input('cilindraje') || !$request->input('potencia') || !$request->input('peso')  ){
    return response()->json(['mensaje'=>'Faltan Datos','codigo'=>422],422);
}

$fabricante = Fabricante::find($id);

if(!$fabricante){
    return response()->json(['mensaje'=>'No se encontró un fabricante con ese ID','codigo'=>404],404);
    
}
$fabricante->vehiculos()->create($request->all());
return response()->json(['mensaje'=>'Vehículo Insertado ','codigo'=>201],201);


}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idFabricante, $idVehiculo)
    {
        return 'mostrando el vehículo con id '.$idVehiculo.' del fabricante con id '.$idFabricante;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
