
@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }} , Nomina UMB</div>

                <div class="panel-body">
  
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }} , Deleyes</div>

                <div class="panel-body">
                    @if (Auth::user()->estado == 'activo' && Auth::user()->tipo_usuario == 'administrador')
                    <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Accion</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Tipo Doc</th>
                                <th>Doc</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Perfil</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                    </table>
                    @else

                     El Usuario Administrador debe Autorizar tu Ingreso
                    @endif
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
