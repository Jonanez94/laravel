<?php

namespace Biblio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use Biblio\Http\Requests;
use Biblio\Http\Requests\CategoriaRequest;
use Biblio\Http\Controllers\Controller;

use Biblio\Categoria;
use Session;

class CategoriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find',['only'=>['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->categoria = Categoria::find($route->getParameter('categoria'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categoria.index');
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
    public function store(CategoriaRequest $request)
    {
        if($request->ajax()){
            Categoria::create($request->all());
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

    public function ListaCategorias(){
        $categorias = Categoria::all();
        return response()->json(
            $categorias->toArray()
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
            $this->categoria->toArray()
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
        $this->categoria->fill($request->all());
        $this->categoria->save();

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
        $this->categoria->delete();
        return response()->json(["mensaje" => "Borrado"]);
    }
}
