@extends('layouts.app2')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/brand/city-profile.jpg') }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
        <div class="card-body">
            
            <form action="{{ route('deleteArchivo', $archivo->id) }}" class="smart-form" role="form" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <h2>Eliminar Archivo</h2>
                <h6 class="heading-small text-muted mb-4">El archivo con los siguientes datos se eliminaran</h6>
                <div class="form-group">                    
                    <label for="exampleFormControlInput1">Nombre del archivo</label>
                    <input type="nombre" class="form-control" id="nombre" name="nombre" value="{{$archivo->nombre}}" readonly>
                </div>
                <div class="col-lg-12">
                    <input type="nombre" class="form-control" id="nombre" name="nombre" value="{{$archivo->path}}" readonly>                    
                </div>
                <br>
                <div class="footer text-center">
                    <a type="button" class="btn btn-danger" onclick="window.history.back();">Atras</a>
                    <button type="submit" class="btn btn-primary">
                        Eliminar
                    </button>                
                </div>
            </form>

        </div>
    </div>
</div>
@endsection