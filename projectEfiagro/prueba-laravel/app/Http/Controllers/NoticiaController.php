<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
//use App\Models\Categoria;
use DB;
//use Carbon\Carbon;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Noticia::all();
       return DB::table('noticias')
            ->join('categorias', 'noticias.categorias_id', '=', 'categorias.id')
            ->select('noticias.*', 'categorias.nombre as categorianombre')
            ->get();
        //return view('noticias.index',['noticias' =>$noticias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Noticia::create($request->all());
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
        $noticia = Noticia::findOrFail($id);
        $noticia->categorias_id = $request->categorias_id;
        $noticia->titulo        = $request->titulo;
        $noticia->contenido     = $request->contenido;
        $noticia->imagen        = '';
        $noticia->update();
        return $noticia;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();
    }
}
