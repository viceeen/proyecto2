@extends('template.master')
@section('contenido-principal')
<form method="POST" action="{{route('cuenta.autenticar')}}">
  @csrf
  <div class="mb-3">
    <label for="user" class="form-label">User</label>
    <input type="text" class="form-control" id="user" name="user" >
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
</form>
@endsection