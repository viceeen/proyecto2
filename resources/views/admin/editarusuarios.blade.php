@extends('template.master')
@section('contenido-principal')
<div class="container-fluid min-vh-100 d-flex flex-column justify-content-lg-center">
  <div class="row d-flex align-items-center justify-content-center flex-column">
    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{route('cuenta.update',$cuenta->user)}}">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label for="nombre" class="form-label">Cambiar Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cuenta->nombre}}">
            </div>
            <div class="mb-3">
              <label for="apellido" class="form-label">Cambiar Apellido</label>
              <input type="text" class="form-control" id="apellido" name="apellido" value="{{$cuenta->apellido}}">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
