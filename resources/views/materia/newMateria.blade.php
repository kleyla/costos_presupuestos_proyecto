@extends('layouts.app2')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/brand/city-profile.jpg') }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
        <div class="card-body">
            
            <form action="{{ route('materiaSave') }}" class="smart-form" role="form" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <h2>Nueva Materia</h2>
                <h6 class="heading-small text-muted mb-4">Introduzca los siguientes datos</h6>
                <div class="form-group">                    
                    <label for="exampleFormControlInput1">Nombre de la materia *</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
                </div>
                <div class="form-group">                    
                    <label for="exampleFormControlInput1">Descripcion de la materia</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="">
                </div>
                <div class="form-group">                    
                    <label for="exampleFormControlInput1">Sigla de la materia</label>
                    <input type="text" class="form-control" id="sigla" name="sigla" placeholder="">
                </div>
                <div class="col-lg-6">
                    <fieldset>
                        <label class="form-control-label" for="input-first-name">Seleccionar Imagen
                        <i class="material-icons">attach_file</i></label> <br>					
                        <section>
                            <input type="file" name="photo" id="photo" required>                                                               
                        </section>
                    </fieldset>
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