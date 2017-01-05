<?php

namespace Biblio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use Biblio\Http\Requests;
use Biblio\Http\Requests\EditorialRequest;
use Biblio\Http\Controllers\Controller;

use Biblio\Editorial;
use Session;

class EditorialController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find',['only'=>['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->editorial = Editorial::find($route->getParameter('editorial'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('editorial.index');
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
    public function store(EditorialRequest $request)
    {
        if($request->ajax()){
            Editorial::create($request->all());
            return response()->json(["mensaje"=>"Creado"]);
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

    public function ListaEditoriales(){
        $editoriales = Editorial::all();
        return response()->json(
            $editoriales->toArray()
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
            $this->editorial->toArray()
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
        $this->editorial->fill($request->all());
        $this->editorial->save();

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
        $this->editorial->delete();
        return response()->json(["mensaje" => "Borrado"]);
    }
}
