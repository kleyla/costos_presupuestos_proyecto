@extends('layouts.app2')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/brand/study2.png')}}') ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Contenido de {{$materia->nombre}}</h1>
          <p id="demo" class="invisible ">{{$link}}</p>
          </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Temas</h2>        
        <div class="team">
          <div class="row">
            @foreach ($temas as $tema)
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <a href="{{route('verTema', $tema->id)}}">
                      <img src="/img/brand/tema.png" alt="Thumbnail Image" 
                      class="img-raised rounded-circle img-fluid">
                    </a>                    
                  </div>
                    <a href="{{route('verTema', $tema->id)}}"><h4 class="card-title">{{$tema->nombre}}</a> 
                    <br>
                    <small class="card-description text-muted">{{$tema->created_at}}</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">{{$tema->descripcion}}</p>
                  </div>
                  <div class="card-footer justify-content-center">
                    @auth
                    <a href="{{route('editTema', $tema->id)}}" class="btn btn-link btn-just-icon">
                        <img src="/img/brand/edit.png" alt="Thumbnail Image" sizes="70x70" class="img-raised rounded-circle img-fluid">
                    </a>
                    <a href="{{route('delTema',$tema->id)}}" class="btn btn-link btn-just-icon">
                        <img src="/img/brand/delete.png" alt="Thumbnail Image" sizes="70x70" class="img-raised rounded-circle img-fluid">
                    </a>
                    <a onclick="ejecutar('demo')" title="Copiar" class="btn btn-link btn-just-icon">
                    <img src="/img/brand/share.png" alt="Thumbnail Image" sizes="70x70" class="img-raised rounded-circle img-fluid" title="Copiar">
                    </a>
                    @else
                    <a onclick="ejecutar('demo')" title="Copiar" class="btn btn-link btn-just-icon">
                    <img src="/img/brand/share.png" alt="Thumbnail Image" sizes="70x70" class="img-raised rounded-circle img-fluid" title="Copiar">
                    </a>
                    @endauth
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @auth
        <a href="{{ route('newTema', $materia->id) }}" class="btn btn-primary btn-link btn-wd btn-lg">Nuevo Tema</a>
        @endauth
      </div>
      
      <div class="section text-center">
        <h2 class="title">Practicos</h2>
        <div class="team">
          <div class="row">
            @foreach ($practicos as $practico)
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <a href="{{route('verTema', $tema->id)}}">
                      <img src="/img/brand/practico.png" alt="Thumbnail Image" 
                      class="img-raised rounded-circle img-fluid">
                    </a>                    
                  </div>
                    <a href=""><h4 class="card-title">{{$practico->nombre}}</a> 
                    <br>
                    <small class="card-description text-muted">{{$practico->created_at}}</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">{{$practico->descripcion}}</p>
                  </div>
                  <div class="card-footer justify-content-center">
                    @auth
                    <a href="{{route('editPractico', $practico->id)}}" class="btn btn-link btn-just-icon">
                        <img src="/img/brand/edit.png" alt="Thumbnail Image" sizes="70x70" class="img-raised rounded-circle img-fluid">
                    </a>
                    <a href="{{route('delPractico', $practico->id)}}" class="btn btn-link btn-just-icon">
                        <img src="/img/brand/delete.png" alt="Thumbnail Image" sizes="70x70" class="img-raised rounded-circle img-fluid">
                    </a>
                    <a href="{{route('downloadPractico', $practico->id)}}" class="btn btn-link btn-just-icon">
                      <img src="/img/brand/download.png" alt="Thumbnail Image" sizes="70x70" class="img-raised rounded-circle img-fluid">
                    </a>
                    <a onclick="ejecutar('demo')" title="Copiar" class="btn btn-link btn-just-icon">
                      <img src="/img/brand/share.png" alt="Thumbnail Image" sizes="70x70" class="img-raised rounded-circle img-fluid" title="Copiar">
                    </a>                    
                    @else
                    <a href="{{route('downloadPractico', $practico->id)}}" class="btn btn-link btn-just-icon">
                      <img src="/img/brand/download.png" alt="Thumbnail Image" sizes="70x70" class="img-raised rounded-circle img-fluid">
                    </a>
                    <a onclick="ejecutar('demo')" title="Copiar" class="btn btn-link btn-just-icon">
                      <img src="/img/brand/share.png" alt="Thumbnail Image" sizes="70x70" class="img-raised rounded-circle img-fluid" title="Copiar">
                    </a>                    
                    @endauth
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @auth
        <a href="{{ route('newPractico', $materia->id) }}" class="btn btn-primary btn-link btn-wd btn-lg">Nuevo Practico</a>
        @endauth
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