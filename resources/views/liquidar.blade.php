
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }} , Deleyes</div>


@if (Auth::user()->estado == 'activo' && Auth::user()->tipo_usuario == 'administrador')

                <div class="panel-body">
            
                        <div class="alert alert-success">
                            Usuario : {{ $perfil[0]->name }}
                        </div>
                        <div class="alert alert-success">
                            Fecha Registro : {{ $perfil[0]->created_at }}
                        </div>
                        <div class="alert alert-success">
                            Tipo Documento : {{ $perfil[0]->tipo_documento }}
                        </div>
                        <div class="alert alert-success">
                            Numero Documento :  {{ number_format($perfil[0]->numero_doc) }}
                        </div>
                        <div class="alert alert-success">
                            Telefono : {{ $perfil[0]->telefono }}
                        </div>
                        <div class="alert alert-success">
                            E-mail : {{ $perfil[0]->email }}
                        </div>
                    




                    <form method="POST" class="form-horizontal">
						<fieldset>
						<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>	
                        <input type="hidden" name="_id" value=" {{ $perfil[0]->id }}"></input>
						<!-- Form Name -->
						<legend>Activar/Ajustar Perfil</legend>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="retirarMonto">Perfil</label>  
						  <div class="col-md-4">
						  <select class="form-control" name="perfil" required>
                            <option value="administrador">Administrador</option>
                            <option value="cliente">Cliente</option>
                          </select>
						  <span class="help-block">Seleccione El Perfil</span>  
						  </div>
						</div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="retirarMonto">Estado</label>  
                          <div class="col-md-4">
                          <select class="form-control" name="estado" required>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                          </select>
                          <span class="help-block">Seleccione El Estado </span>  
                          </div>
                        </div>

						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="singlebutton">Guardar</label>
						  <div class="col-md-4">
						    <button id="singlebutton" name="singlebutton" class="btn btn-danger">Enviar</button>
						  </div>
						</div>

						</fieldset>
					</form>
                    @else

                     El Usuario Administrador debe Autorizar tu Ingreso
                @endif


                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection