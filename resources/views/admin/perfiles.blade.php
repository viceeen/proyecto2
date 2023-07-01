@extends('template.master')
@section('hojas-estilo')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('contenido-principal')

<div class="row d-flex align-items-center justify-content-center flex-column">
    <div class="col-8">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nombre Usuario</th>
              <th scope="col">Nombre</th> 
              <th scope="col">Apellido</th>
              <th scope="col">Editar</th>
               <th scope="col">Borrar</th> 
            </tr>
          </thead>
          <tbody>
            @foreach($cuentas as $cuenta)
                
            <tr>
              <td>{{$cuenta->user}}</td>
              <td>{{$cuenta->nombre}}</td>
              <td>{{$cuenta->apellido}}</td>
              <td> 
                @if (Gate::allows('admin'))
                  <a href="{{route('cuenta.editar', $cuenta->user)}}" class="btn btn-primary @if(Auth::user()->perfil_id==$cuenta->perfil_id) d-none @endif">
                    <span class="material-icons">
                        edit  
                    </span>
                  </a>
                @endif
              </td>
              <td>
                @if (Gate::allows('admin'))
                <button type="button" class="btn btn-danger @if(Auth::user()->perfil_id==$cuenta->perfil_id) d-none @endif" data-bs-toggle="modal" data-bs-target="#exampleModal{{$cuenta->user}}">
                    <span class="material-icons">
                        delete
                    </span> 
                </button>
                <div class="modal fade" id="exampleModal{{$cuenta->user}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel{{$cuenta->user}}">Confirmación de Borrado</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{route('cuenta.delete',$cuenta->user)}}">
                        @method('delete')
                        @csrf
                        <div class="modal-body">
                            ¿Borrar usuario <span class="text-danger fw-bold">{{$cuenta->user}}</span>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Borrar</button> 
                        </div>
                    </form>
                    </div>
                </div>
                </div>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>

@endsection