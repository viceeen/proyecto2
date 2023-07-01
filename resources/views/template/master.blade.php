<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-custom.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @yield('hojas-estilo')
    <title>Home</title>
</head>

<body>

<div class="container-fluid" >
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar" >
      <div class="sidebar-sticky">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>  
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="{{route('home.index')}}">Inicio</a>
          </li>
          <hr class=" @if (Gate::allows('artista')) d-none @endif">
         
          <li class="nav-item @if (Gate::allows('artista')) d-none @endif">
            <a class="nav-link active" href="{{route('home.login')}}">Inicia Sesion</a>
          </li> 
          
          
          <hr class=" @if (Gate::allows('artista')) d-none @endif">
          
          <li class="nav-item @if (Gate::allows('artista')) d-none @endif"> 
            <a class="nav-link active" href="{{route('artista.index')}}">Crear Cuenta</a>
          </li>
          
          <hr> 
          @if (Gate::allows('artista'))
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('usuarios.logout')}}">Cerrar Sesion</a>
          </li>
          
          <hr>
          @endif
          @if (Gate::allows('artista-perfil'))
          <li class="nav-item">
            <a class="nav-link" href="{{route('artista.perfil',Auth::user()->user)}}">Ver Perfil</a>
          </li>
          <hr>
          @endif
          @if (Gate::allows('admin')) 
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('administrador.index')}}">Ver Perfiles</a>
          </li>
          @endif
        </ul>
      </div>
    </nav>
    <main role="main" class="col-md-10 ml-sm-auto">
    
    
    
      <div class="container-fluid" style="height:">
          @yield('contenido-principal')
      </div>
      
    </main>
  </div>
</div>
   @yield('scripts-referencias')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    @yield('scripts-manual')



    
</body>

</html>