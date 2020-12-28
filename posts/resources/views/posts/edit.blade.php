@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Editar post</div>
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('posts.update',['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                       <input type="hidden" name="_method" value="PUT">
                      @csrf
                      <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $post->titulo }}" required>
                      </div>
                      <div class="form-group">
                        <label for="contenido">Contenido</label>
                        <textarea  class="form-control" id="contenido" name="contenido" rows="4" cols="80" required>{{ $post->contenido }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <select class="form-control" id="categoria" name="categoria" required>
                          <option value="">Seleccionar</option>
                          <?php foreach ($categorias as $categoria) { ?>
                              <option value="<?php echo $categoria->id; ?>" <?php if($categoria->id==$post->categorias_id){ echo "selected";} ?>><?php echo $categoria->nombre; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                        <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                      </div>
                        <div class="form-group">
                        <label for="estatus"><b>Foto</b></label>
                        <br>
                        <img src="{{url('/imagenes/'.$post->imagen)}}" style="width:200px; heigth:200px;">
                      </div>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    </form>
                    <hr>
                    <form action="{{ route('posts.destroy',['id' => $post->id]) }}" method="post">
                      <input name="_method" type="hidden" value="DELETE">
                      @csrf
                      <input type="submit" class="btn btn-danger" name="Eliminar" value="Eliminar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection