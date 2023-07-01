@extends('template.master')
@section('hojas-estilo')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('contenido-principal')

<div class="container">
  <div class="row">

    @foreach($imagenes as $imagen)
      @if (!$imagen->baneada)
      <div class="col-4">
        <div class="card mb-3 mt-3" style="width: 350px; height: 350px;">
          <img src="{{asset('storage/' . $imagen->archivo)}}" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">{{$imagen->titulo}}</h5>
            <h6>@<span>{{$imagen->cuenta_user}}</span></h6>
            <div class="row">
              @if (Gate::allows('admin'))
              <form method="POST" action="{{route('imagen.update',$imagen->id)}}">
                @method('PUT')
                @csrf
                <div class="col text-end">
                  
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span class="material-icons">
                      visibility_off
                    </span>
                  </button>

                  
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Motivo de Ban</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <div class="mb-3">
                            ¿Estas seguro que quieres banear la imagen del usuario @<span class="text-danger fw-bold">{{$imagen->cuenta_user}}</span>?
                           </div>
                           <div class="mb-3 text-center">
                            <label for="motivo_ban" class="form-label">Motivo de Ban</label>
                            <input type="text" class="form-control" id="motivo_ban" name="motivo_ban">
                           </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-danger">Banear imagen</button>
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