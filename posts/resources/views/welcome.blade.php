@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Listado de Publicaciones - Agregando Valor</div>
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Título</th>
                          <th>Contenido</th>
                          <th>Categoría</th>
                          <th>Imagen</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($posts as $post) { ?>
                            <tr>
                            <td><a href="show/<?php echo $post->id; ?>"><?php echo $post->id; ?></a></td>
                              <td><?php echo $post->titulo; ?></td>
                              <td><?php echo nl2br($post->contenido); ?></td>
                              <td><?php echo $post->categorianombre; ?></td>
                              <td><img src="{{url('/imagenes/'.$post->imagen)}}" style="width:50px;"></td>
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection