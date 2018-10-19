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
                    @else

                     <form method="POST" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>  {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                            <label for="fecha" class="col-md-4 control-label">Fecha</label>

                            <div class="col-md-6">
                                <input id="fecha" type="text" class="form-control" name="fecha" value="{{ old('fecha') }}" required autofocus>

                                @if ($errors->has('fecha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required autofocus>

                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipo_documento') ? ' has-error' : '' }}">
                            <label for="soporte" class="col-md-4 control-label">Soportes</label>

                            <div class="col-md-6">
                                 <input id="soporte" type="text" class="form-control" name="soporte" value="{{ old('soporte') }}" required autofocus>  
                                @if ($errors->has('soporte'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('soporte') }}</strong>
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