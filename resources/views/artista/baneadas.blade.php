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
                <h6>Publicaciones: </h6>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container-fluid d-flex flex-column align-items-center">
    <div class="row">
        <div class="col-6">
            <a href="">Mis publications</a>
        </div>
        <div class="col-6   ">
            <a href="{{route('baneadas.index',Auth::user()->user)}}">Publicaciones Baneadas</a>
        </div>
    </div>
</div>


<hr>
@endsection