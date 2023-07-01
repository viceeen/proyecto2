@extends('template.master')
@section('hojas-estilo')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('contenido-principal')
<div class="container-fluid d-flex flex-column align-items-center">
    <div class="row align-items-center">
        <div class="col-lg-4 m-5">
            <div class="d-flex align-items-center">
                <!-- Aquí va la foto de perfil -->
                <span class="material-icons" style="font-size: 10rem;">
                account_circle
                </span>
                <!-- Aquí van los datos del perfil -->
                <div>
                <div class="d-flex flex-row">
                    @if (Auth::user())
                    <div class="col">
                        <h2>{{Auth::user()->nombre}} </h2>
                    </div>
                    @endif
                    <div class="col p-1">
                        <a href="" class="text-dark">
                            <span class="material-icons" style="font-size: 2rem;">
                                settings
                            </span>
                        </a>
                    </div>
                </div>
                <h6>Publicaciones: {{count($cuenta->imagenes)}} </h6>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container-fluid d-flex flex-column align-items-center">
    <div class="row">
        <div class="col-6">
            <a href="{{route('artista.perfil',Auth::user()->user)}}">Mis publicaciones</a>
        </div>
        <div class="col-6   ">
            <a href="{{route('baneadas.index',Auth::user()->user)}}">Publicaciones Baneadas</a>
        </div>
    </div>
</div>


<hr>
<div class="row">
    <div class="col-4">
        <div class="card mt-3" style="width: 22rem;">
            <div class="card-body text-center">
                <button class="btn text-secondary" type="button" data-bs-toggle="modal" data-bs-target="#subir_imagenes">
                    <span class="material-icons" style="font-size: 18.5rem;">
                        add
                    </span>
                </button>
                <div class="modal fade" id="subir_imagenes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Imagen</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('imagen.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Agregar Foto </label>
                                    <input type="file" id="imagen" name="imagen" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Titulo </label>
                                    <input type="text" id="titulo" name="titulo" class="form-control">
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Subir</button>
                            </form>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($cuenta->imagenes as $imagen) 
            <div class="col-4">
                <div class="card mb-3 mt-3" style="width: 350px; height: 350px;">
                    <img src="{{ asset('storage/' . $imagen->archivo) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$imagen->titulo}}</h5>
                        
                        <h6>@<span>{{$cuenta->user}}</span></h6>
                    </div>
                </div>
            </div>
        
    @endforeach
</div>
@endsection