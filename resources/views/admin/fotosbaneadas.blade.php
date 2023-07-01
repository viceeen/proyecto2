@extends('template.master')
@section('hojas-estilo')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('contenido-principal')
<div class="container">
  <div class="row">

    @foreach($imagenes as $imagen)
     
        @if ($imagen->baneada)
        <div class="col-4">
          <div class="card mb-3 mt-3">
            <img src="{{asset('storage/' . $imagen->archivo)}}" class="card-img-top" alt="" style="max-height: 400px; max-width: 470px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">{{$imagen->titulo}}</h5>
              <h6>@<span>{{$imagen->cuenta_user}}</span></h6>
              <div class="row">
                @if (Gate::allows('admin'))
                <form method="POST" action="{{route('imagen.desbanear',$imagen->id)}}">
                  @method('PUT')
                  @csrf
                  <div class="col text-end">
                    
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$imagen->id}}">
                      <span class="material-icons">
                        visibility
                      </span>
                    </button>

                    
                    <div class="modal fade" id="exampleModal{{$imagen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel{{$imagen->id}}">Motivo de Ban</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3 text-center">
                            ¿Estas seguro que quieres desbanear la imagen del usuario @<span class="text-danger fw-bold">{{$imagen->cuenta_user}}</span>?
                            </div>
                            <div class="mb-3 text-center">
                            El motivo de ban de esta imagen fue <span class="text-danger fw-bold">{{$imagen->motivo_ban}}</span>
                            </div> 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Desbanear imagen</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                @endif
              </div>
            </div>
          </div>
        </div>
        @endif
    @endforeach
    
  </div>
</div>
@endsection