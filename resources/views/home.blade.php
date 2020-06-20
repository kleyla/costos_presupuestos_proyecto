@extends('layouts.app2')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/brand/study2.png')}}') ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Administrador de Materias</h1>
          <h4>En nuestra pagina tu puedes manejar tus materias subiendo contenido y compartiendolo con tus alumnos y/o companheros.</h4>         
          <p id="demo" class="invisible ">{{$link}}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Tus Materias</h2>
        <div class="team">
          <div class="row">
            @foreach ($materias as $materia)
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <a href="{{route('verMateria', $materia->id)}}">
                      <img sizes="70x70" src="/img/materias/{{ $materia->imagen }}" alt="Thumbnail Image" 
                      class="img-raised rounded-circle img-fluid">
                    </a>                    
                  </div>
                    <a href="{{route('verMateria', $materia->id)}}"><h4 class="card-title">{{$materia->nombre}}</a> 
                    <br>
                    <small class="card-description text-muted">{{$materia->sigla}}</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">{{$materia->descripcion}}</p>
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="{{route('editMateria', $materia->id )}}" class="btn btn-link btn-just-icon">
                        <img src="/img/brand/edit.png" alt="Thumbnail Image" sizes="70x70" class="img-raised rounded-circle img-fluid">
                    </a>
                    <!-- Button trigger modal -->
                    <a href="{{route('delMateria',$materia->id) }}" class="btn btn-link btn-just-icon">
                        <img src="/img/brand/delete.png" alt="Thumbnail Image" sizes="70x70" class="img-raised rounded-circle img-fluid">
                    </a>                    
                    <a onclick="ejecutar('demo')" title="Copiar" class="btn btn-link btn-just-icon">
                      <img src="/img/brand/share.png" alt="Thumbnail Image" sizes="70x70" class="img-raised rounded-circle img-fluid" title="Copiar">
                    </a>                    
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <a href="{{ route('newMateria') }}" class="btn btn-primary btn-link btn-wd btn-lg">Nueva Materia</a>
      </div>
      
    </div>
  </div>

  @endsection
  <script>
    
    function ejecutar(idelemento){
      var aux = document.createElement("div");
      aux.setAttribute("contentEditable", true);
      aux.innerHTML = document.getElementById(idelemento).innerHTML;
      aux.setAttribute("onfocus", "document.execCommand('selectAll',false,null)"); 
      document.body.appendChild(aux);
      aux.focus();
      document.execCommand("copy");
      document.body.removeChild(aux);
    }

  </script>