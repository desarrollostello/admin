@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Perfil
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-3 col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading center" style="text-align:center">AVATAR</div>
                <div class="panel-body">
                   @if (Auth::user()->profile->avatar)
                        <img src="{{ asset('img/' . Auth::user()->profile->avatar ) }}" class="img-circle" alt="User Image" />
                   @else
                        <img src="{{ asset('img/avatar-default.png') }}" class="img-circle" alt="User Image" />
                   @endif 

                    <div class="row" style="margin-top: 15px; margin-left: 1px">
                        <h4>Seleccione archivos</h4>
                        <div class="control-group input-group" style="margin-top:5px">
                            <input id="file" type="file" class="form-control " name="file[]" multiple />
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center">DATOS DEL PERFIL
                  <p class="pull-right">
                    <a href="{{ route('profile.index') }}" class="btn btn-sm btn-primary pull-right">
                      Volver
                    </a>
                  </p>
                </div>


                <div class="panel-body">
                    <p><strong>Apellido</strong>  {{ Auth::user()->profile->apellido }}</p>
                    <p><strong>Nombre</strong>  {{ Auth::user()->profile->nombre }}</p>
                    <p><strong>Usuario</strong>       {{ Auth::user()->name }}</p>
                    <p><strong>Email</strong>        {{ Auth::user()->email}}</p>
                    <p><strong>Teléfono</strong>         {{ Auth::user()->profile->telefono }}</p>
                    
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
