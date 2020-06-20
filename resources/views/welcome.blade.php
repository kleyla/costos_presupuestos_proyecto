@extends('layouts.app')
@section('content')

<div class="page-header header-filter" 
  style="background-image: url('{{asset('img/brand/study.jpg')}}'); background-size: cover; background-position: top center;">
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
                <form class="form-horizontal">
                    <br>
                    <div class="card-body">
                        <p class="description text-center">Este es un proyecto para la materia de Costos y Presupuestos 
                        dictada por el Licenciado Alejandro Correa.</p>
                        <p class="description text-center">Este proyecto fue realizado por Karen Gueila Rodriguez Granadero
                        con registro 216044898, en la Gestion I-2019.</p>
                        
                        <div class="text-center">
                        <a href="{{ route('start') }}" type="button" class="btn btn-primary center" class="btn btn-primary btn-link btn-wd btn-lg">Ver materias</a> 
                        </div>
                        <br>
                    </div>
                </form>
          </div>
        </div>
      </div>
    </div>

@endsection

