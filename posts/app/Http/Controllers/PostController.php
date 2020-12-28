<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categoria;
use DB;
use Carbon\Carbon;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $posts = DB::table('posts')
            ->join('categorias', 'posts.categorias_id', '=', 'categorias.id')
            ->join('users', 'posts.users_id', '=', 'users.id')
            ->where('posts.users_id',$user->id)
            ->select('posts.*', 'categorias.nombre as categorianombre','users.name as usuario')
            ->get();
        return view('posts.index',['posts' =>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre', 'desc')
            ->get();
        return view('posts.create',['categorias' =>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $post = new post;
        $post->titulo = $request->titulo;
        $post->contenido = $request->contenido;
        $post->imagen = "";
        $post->users_id = $user->id;
        $post->categorias_id = $request->categoria;
        //$post->estatus = $request->estatus;
        if($request->file('imagen')) {
            $imagen = $request->file('imagen');
            $ruta = '/imagenes/';
            $nombre = sha1(Carbon::now()).'.'.$imagen->guessExtension();
            $imagen->move(getcwd().$ruta, $nombre);
            $post->imagen = $nombre;
        }
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $post = DB::table('posts')
            ->join('categorias', 'posts.categorias_id', '=', 'categorias.id')
            ->join('users', 'posts.users_id', '=', 'users.id')
            ->where('posts.users_id',$user->id)
            ->where('posts.id',$id)
            ->select('posts.*', 'categorias.nombre as categorianombre','users.name as usuario')
            ->first();
        return view('posts.show',['post' =>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $post = DB::table('posts')
            ->join('categorias', 'posts.categorias_id', '=', 'categorias.id')
            ->join('users', 'posts.users_id', '=', 'users.id')
            ->where('posts.users_id',$user->id)
            ->where('posts.id',$id)
            ->select('posts.*', 'categorias.nombre as categorianombre','users.name as usuario')
            ->first();
        $categorias = Categoria::orderBy('nombre', 'desc')
            ->get();
        return view('posts.edit',['post' => $post, 'categorias' => $categorias]);
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
        $user = auth()->user();
        $post = Post::find($id);
        $post->titulo = $request->titulo;
        $post->contenido = $request->contenido;
        $post->users_id = $user->id;
        $post->categorias_id = $request->categoria;
        if($request->file('imagen')) {
            $imagen = $request->file('imagen');
            $ruta = '/imagenes/';
            $nombre = sha1(Carbon::now()).'.'.$imagen->guessExtension();
            $imagen->move(getcwd().$ruta, $nombre);
            $post->imagen = $nombre;
        }
        $post->save();
        //return redirect()->route('posts.show',['id' => $id ]);
        return redirect()->route('posts.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
