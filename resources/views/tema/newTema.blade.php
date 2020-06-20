@extends('layouts.app2')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/brand/city-profile.jpg') }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
        <div class="card-body">
            
            <form action="{{ route('temaSave', $idMa) }}" class="smart-form" role="form" method="post" >
                {{csrf_field()}}
                <h2>Nuevo Tema</h2>
                <h6 class="heading-small text-muted mb-4">Introduzca los siguientes datos</h6>
                <div class="form-group">                    
                    <label for="exampleFormControlInput1">Nombre del tema *</label>
                    <input type="nombre" class="form-control" id="nombre" name="nombre" placeholder="">
                </div>
                <div class="form-group">                    
                    <label for="exampleFormControlInput1">Descripcion del tema</label>
                    <input type="descripcion" class="form-control" id="descripcion" name="descripcion" placeholder="">
                </div>
                <br>
                <div class="footer text-center">
                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>                
                </div>
            </form>

        </div>
    </div>
</div>
@endsection