@extends('layouts.app')

@section('content')





<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Hola  {{ Auth::user()->name }} Bienvenido a tu Cuenta Deleyes Servicio Creación de empresa (formulario):</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->estado == 'inactivo')
                        El Usuario Administrador debe Autorizar tu Ingreso
                    @else





                     <form method="POST" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>  {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre_empresa') ? ' has-error' : '' }}">
                            <label for="nombre_empresa" class="col-md-4 control-label"> Nombre empresa</label>

                            <div class="col-md-6">
                                <input id="nombre_empresa" type="text" class="form-control" name="nombre_empresa" value="{{ old('nombre_empresa') }}" required autofocus>

                                @if ($errors->has('nombre_empresa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre_empresa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipo_empresa') ? ' has-error' : '' }}">
                            <label for="tipo_empresa" class="col-md-4 control-label">Tipo de empresa</label>

                            <div class="col-md-6">
                                <select id="tipo_empresa" type="text" class="form-control" name="tipo_empresa" value="{{ old('tipo_empresa') }}" required autofocus>
                                	<option></option>
                                	<option value="SA">SA</option>
                                	<option value="SAS">SAS</option>
                                	<option value="LTDA">LTDA</option>
                                </select>

                                @if ($errors->has('tipo_empresa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipo_empresa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('numero_accionistas') ? ' has-error' : '' }}">
                            <label for="soporte" class="col-md-4 control-label">Número de accionistas</label>

                            <div class="col-md-6">
                                 <input id="numero_accionistas" type="number" class="form-control" name="numero_accionistas" value="{{ old('numero_accionistas') }}" required autofocus>  
                                @if ($errors->has('soporte'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numero_accionistas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cantidad_capital') ? ' has-error' : '' }}">
                            <label for="departamento" class="col-md-4 control-label">Cantidad de capital ($)</label>

                            <div class="col-md-6">
                                <input id="cantidad_capital" type="number" class="form-control" name="cantidad_capital" value="{{ old('cantidad_capital') }}" required autofocus>

                                @if ($errors->has('departamento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cantidad_capital') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('departamento') ? ' has-error' : '' }}">
                            <label for="departamento" class="col-md-4 control-label">Departamento</label>

                            <div class="col-md-6">
                                <input id="departamento" type="text" class="form-control" name="departamento" value="{{ old('departamento') }}" required autofocus>

                                @if ($errors->has('departamento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('departamento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">
                            <label for="ciudad" class="col-md-4 control-label">Ciudad</label>

                            <div class="col-md-6">
                                <input id="ciudad" type="text" class="form-control" name="ciudad" value="{{ old('ciudad') }}" required>

                                @if ($errors->has('ciudad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ciudad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection