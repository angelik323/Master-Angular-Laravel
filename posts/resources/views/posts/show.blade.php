@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalle post</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form>
                      @csrf
                      <div class="form-group">
                        <label for="titulo"><b>Título</b></label>
                        <input type="text" readonly class="form-control-plaintext"  id="titulo" name="titulo" value="{{ $post->titulo }}">
                      </div>
                      <div class="form-group">
                        <label for="contenido"><b>Contenido</b></label>
                        <textarea  readonly class="form-control-plaintext"  id="contenido" name="contenido" rows="4" cols="80" required>{{ $post->contenido }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="categoria"><b>Categoría</b></label>
                        <input type="text" readonly class="form-control-plaintext"  id="categoria" name="categoria" value="{{ $post->categorianombre }}">
                      </div>
                      
                      <div class="form-group">
                        <label for="estatus"><b>Foto</b></label>
                        <br>
                        <img src="{{url('/imagenes/'.$post->imagen)}}" style="width:200px; heigth:200px;">
                      </div>
                      <div class="form-group">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Editar</a>
                      </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection