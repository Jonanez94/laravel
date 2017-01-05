<?php

namespace Biblio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use Biblio\Http\Requests;
use Biblio\Http\Requests\LibroRequest;
use Biblio\Http\Controllers\Controller;

use Biblio\Libro;
use Session;
use DB;

class LibroController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->beforeFilter('@find',['only'=>['update','destroy']]);
    }

    public function find(Route $route){
        $this->libro = Libro::find($route->getParameter('libro'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('libro.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibroRequest $request)
    {
        if($request->ajax()){
            Libro::create($request->all());
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

    public function ListaLibros(){
        $libros = DB::table('libros as l')
                    ->join('autores as a','a.id','=','l.fk_autor')
                    ->join('categorias as c','c.id','=','l.fk_categoria')
                    ->join('editoriales as e','e.id','=','l.fk_editorial')
                    ->select('l.id','l.titulo','l.fecha_lanzamiento','a.autor','c.categoria','e.editorial','l.descripcion','l.paginas')
                    ->orderBy('l.titulo', 'asc')
                    ->get();
        return response()->json($libros);
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

    public function DatosLibro($id){
        $libro = DB::table('libros as l')
                    ->join('autores as a','a.id','=','l.fk_autor')
                    ->join('categorias as c','c.id','=','l.fk_categoria')
                    ->join('editoriales as e','e.id','=','l.fk_editorial')
                    ->select('l.titulo','l.fecha_lanzamiento','a.id as autor','c.id as categoria','e.id as editorial','l.descripcion','l.paginas')
                    ->where('l.id', '=', $id)
                    ->get();
        return response()->json($libro);
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
        $this->libro->fill($request->all());
        $this->libro->save();

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
        $this->libro->delete();
        return response()->json(["mensaje" => "Borrado"]);
    }
}
