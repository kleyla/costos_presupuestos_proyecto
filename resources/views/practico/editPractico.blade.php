@extends('layouts.app2')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/brand/city-profile.jpg') }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
        <div class="card-body">
            
            <form action="{{ route('editedPractico', $practico->id) }}" class="smart-form" role="form" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <h2>Editar Practico</h2>
                <h6 class="heading-small text-muted mb-4">Usdet puede editar los siguientes datos</h6>
                <div class="form-group">                    
                    <label for="exampleFormControlInput1">Nombre del practico *</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$practico->nombre}}">
                </div>
                <div class="form-group">                    
                    <label for="exampleFormControlInput1">Descripcion del practico</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$practico->descripcion}}">
                </div>
                <div class="col-lg-6">
                <input type="text" class="form-control"  value="{{$practico->archivo}}" readonly>
                    <fieldset>
                        <label class="form-control-label" for="input-first-name">Cambiar archivo
                        <i class="material-icons">attach_file</i></label> <br>					
                        <section>
                            <input type="file" name="archivo" id="archivo">                                                               
                        </section>
                    </fieldset>
                </div>
                <br>
                <div class="footer text-center">
                    <a type="button" class="btn btn-danger" onclick="window.history.back();">Atras</a>
                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>                
                </div>
            </form>

        </div>
    </div>
</div>
@endsection