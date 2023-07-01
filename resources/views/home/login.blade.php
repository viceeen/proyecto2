@extends('template.master')
@section('contenido-principal')
<div class="container-fluid min-vh-100 d-flex flex-column justify-content-lg-center">
  <div class="row d-flex align-items-center justify-content-center flex-column">
    <div class="col-6">
    @if ($errors->any())
      <div class="alert alert-warning">
          @foreach ($errors->all() as $error)
          {{ $error }}
          @endforeach
      </div>
    @endif
      <div class="card">
        <div class="card-header text-center">
          <h5>Inicio de Sesion</h5>
          <div class="card-body">
            <form method="POST" action="{{route('cuenta.autenticar')}}">
              @csrf
              <div class="mb-3">
                <label for="user" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="user" name="user" >
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection