<?php

namespace Biblio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use Biblio\Http\Requests;
use Biblio\Http\Requests\LectorRequest;
use Biblio\Http\Controllers\Controller;

use Biblio\Lector;
use Session;

class LectorController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find',['only'=>['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->lector = Lector::find($route->getParameter('lector'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lector.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lector.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LectorRequest $request)
    {
        if($request->ajax()){
            $request['password'] = bcrypt($request->password);
            Lector::create($request->all());
            return response()->json(["mensaje" => "Creado"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('lector.consult');
    }

    public function ListaLectores(){
        $lectores = Lector::all();
        return response()->json(
            $lectores->toArray()
        );
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
            $this->lector->toArray()
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
        $this->lector->fill($request->all());
        $this->lector->save();

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
        $this->lector->delete();
        return response()->json(["mensaje" => "Borrado"]);
    }
}
