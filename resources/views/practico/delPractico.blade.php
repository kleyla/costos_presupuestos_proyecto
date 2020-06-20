@extends('layouts.app2')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/brand/city-profile.jpg') }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
        <div class="card-body">
            
            <form action="{{ route('deletePractico', $practico->id) }}" class="smart-form" role="form" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <h2>Eliminar Practico</h2>
                <h6 class="heading-small text-muted mb-4">El practico {{$practico->nombre}} se eliminara con los siguientes datos</h6>
                <div class="form-group">                    
                    <label for="exampleFormControlInput1">Nombre del practico *</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$practico->nombre}}" readonly>
                </div>
                <div class="form-group">                    
                    <label for="exampleFormControlInput1">Descripcion del practico</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$practico->descripcion}}" readonly>
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control"  value="{{$practico->archivo}}" readonly>
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