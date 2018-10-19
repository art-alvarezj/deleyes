@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Hola  {{ Auth::user()->name }} Bienvenido a tu Cuenta Deleyes</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->estado == 'inactivo')
                        El Usuario Administrador debe Autorizar tu Ingreso
                    @elseif (Auth::user()->estado == 'activo' && Auth::user()->tipo_usuario == 'administrador')
                        Dashboard Administrativo :
                        <a href="{{ url('/datatable') }}">
                        <button type="button" class="btn btn-warning">Usuario</button>
                        </a>
                        <a href="{{ url('/cliente') }}">
                        <button type="button" class="btn btn-default">Clientes</button>
                        </a>
                        <a href="{{ url('/servicios') }}">
                        <button type="button" class="btn btn-primary">Servicios</button>
                        </a>
                     @elseif (Auth::user()->estado == 'activo' && Auth::user()->tipo_usuario == 'cliente')  
                     Dashboard Cliente :
                        <a href="{{ url('/extractos') }}">
                        <button type="button" class="btn btn-warning">Servicio Creación de empresa</button>
                        </a>
                        <a href="{{ url('/datacredito') }}">
                        <button type="button" class="btn btn-danger">Servicio Data Crédito</button>
                        </a>  
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
