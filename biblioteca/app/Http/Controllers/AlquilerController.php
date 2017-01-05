<?php

namespace Biblio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use Biblio\Http\Requests;
use Biblio\Http\Controllers\Controller;

use Biblio\Alquiler;
use Biblio\Libro;
use Session;
use DB;

class AlquilerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find',['only'=>['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->alquiler = Alquiler::find($route->getParameter('prestamo'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alquiler.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alquiler.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            Alquiler::create($request->all());
            return response()->json(["mensaje" => "Creado"]);
        }
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

    public function ListaTitulos(){
        $libros = Libro::all();
        return response()->json(
            $libros->toArray()
        );
    }

    public function ListaPrestamos(){
        $prestamos = DB::table('alquileres as a')
                    ->join('lectores as le','le.id','=','a.fk_lector')
                    ->join('libros as li','li.id','=','a.fk_libro')
                    ->select('a.id','li.titulo','le.nombre','a.fecha_salida','a.fecha_entrada')
                    ->orderBy('li.titulo', 'asc')
                    ->get();
        return response()->json($prestamos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(
            $this->alquiler->toArray()
        );
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
        $this->alquiler->fill($request->all());
        $this->alquiler->save();

        return response()->json(["mensaje" => "Actualización realizada"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->alquiler->delete();
        return response()->json(["mensaje" => "Borrado"]);
    }
}
