@extends('layouts.app2')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/brand/study2.png')}}') ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Contenido de {{$tema->nombre}}</h1>
          </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
    <br>
        @auth
        <div class="text-right">
            <a href="{{ route('newArchivo', $tema->id) }}" type="button" class="btn btn-primary left" class="btn btn-primary btn-link btn-wd btn-lg">Nuevo archivo</a>            
        </div>
        @endauth
      <div class="text-center">
        <h2 class="title">Archivos</h2>
        
        <div class="team">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">El tema {{$tema->nombre}} tiene los siguientes archivos</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                      </thead>
                      <tbody>
                        @foreach ($archivos as $archivo)
                        <tr>
                          <td>{{$archivo->id}} </td>
                          <td>{{$archivo->nombre}} </td>                        
                            <td class="td-actions text-left">
                                @guest
                                <a href="{{route('downloadArchivo', $archivo->id)}}" title="Descargar" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">cloud_download</i>
                                </a>
                                @else
                                <a href="{{route('downloadArchivo', $archivo->id)}}" title="Descargar" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">cloud_download</i>
                                </a>
                                <a href="{{route('delArchivo', $archivo->id)}}" tile="Eliminar" class="btn btn-danger btn-link btn-sm">
                                    <i class="material-icons">close</i>
                                </a>
                                @endguest 
                                <a onclick="ejecutar('demo')" title="Copiar" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">share</i>
                                </a>                                 
                                <p id="demo" class="invisible ">{{$link}}</p>
                            </td>                         
                        </tr>
                        @endforeach                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


  @endsection

  <script>

    function copiarAlPortapapeles(id_elemento) {
      var aux = document.createElement("input");
      aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
      document.body.appendChild(aux);
      aux.select();
      document.execCommand("copy");
      document.body.removeChild(aux);
    }

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




