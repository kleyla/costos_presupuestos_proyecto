@extends('layouts.app2')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/brand/city-profile.jpg') }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
        <div class="card-body">
            
            <form action="{{ route('materiaEdited', $materia->id) }}" class="smart-form" role="form" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <h2>Editar la Materia</h2>
                <h6 class="heading-small text-muted mb-4">Introduzca los siguientes datos</h6>
                <div class="form-group">                    
                    <label for="exampleFormControlInput1">Nombre de la materia *</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$materia->nombre}}">
                </div>
                <div class="form-group">                    
                    <label for="exampleFormControlInput1">Descripcion de la materia</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$materia->descripcion}}">
                </div>
                <div class="form-group">                    
                    <label for="exampleFormControlInput1">Sigla de la materia</label>
                    <input type="text" class="form-control" id="sigla" name="sigla" value="{{$materia->sigla}}">
                </div>
                <div class="col-lg-6">
                    <fieldset>
                        <label class="form-control-label" for="input-first-name">Seleccionar Imagen
                        <i class="material-icons">attach_file</i></label> <br>
                        <input type="text" class="form-control" id="imagen" name="imagen" value="{{$materia->imagen}}">					
                        <section >
                            <input type="file" name="photo" id="photo">                                                               
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