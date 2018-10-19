<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\cuenta;
use App\cliente;
use DataTables;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class empleadoController extends Controller
{
    

    public function datatable()
    {
        return view('datatable');
    }

    public function nominaLiquidar(Request $request ,$id)
    {
        // die(dd($request));

        $perfil = DB::table('users')->select('id', 'name', 'tipo_documento', 'numero_doc', 'telefono', 'email', 'created_at', 'estado', 'tipo_usuario')->where('id',$id)->get();

        if($request->isMethod('post')){

          //
          $id = request()->id;
          $perfil = request()->perfil;
          $estado = request()->estado;

          //dd($id);
          $user = User::find($id);
          $user->id = $id;
          $user->tipo_usuario = $perfil;
          $user->estado = $estado;
          $user->save();

            $cliente = new cliente();
            $perfil = DB::table('users')->select('id', 'name', 'tipo_documento', 'numero_doc')->where('id',$id)->get();
            $siExisteCliente = DB::table('clientes')->select('id')->where('cedula','=',''.$perfil[0]->numero_doc.'')->first();
            if (!empty($siExisteCliente)) {
            $cliente = $cliente->find($siExisteCliente->id);
            }

            $cliente->nombre  = $perfil[0]->name;
            $cliente->tipo_doc = $perfil[0]->tipo_documento;
            $cliente->cedula = $perfil[0]->numero_doc;
            $cliente->save();

          
          return redirect('datatable');
       }
    
        return view('liquidar', compact('perfil'));
    }


    public function getPosts()
    {
        return \DataTables::of(User::query())->addColumn('action', function () {
                // return '<a href="" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                return '<a href""><button type="button" class="btn btn-xs btn-primary">Activar</button></a>';
            })
            ->make(true);;
    }
}
