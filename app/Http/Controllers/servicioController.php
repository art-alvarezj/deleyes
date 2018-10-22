<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\cuenta;
use App\cliente;
use App\servicio;
use DataTables;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class servicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('servicios');
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function getPosts()
    {
        //$listadoEquipos = new cliente();
        return Datatables::of(servicio::query())->make(true);
    }


    



 public function creacionempresa(Request $request )
    {
        $perfil = DB::table('users')->select('id', 'name', 'tipo_documento', 'numero_doc', 'telefono', 'email', 'created_at', 'estado', 'tipo_usuario')->where('id',Auth::user()->id)->get();

        if($request->isMethod('post')){

          //
          //$fecha = request()->fecha;
          $nombre_empresa = request()->nombre_empresa;
          $tipo_empresa = request()->tipo_empresa;
          $numero_accionistas = request()->numero_accionistas;
          $cantidad_capital = request()->cantidad_capital;
          $departamento = request()->departamento;
          $ciudad = request()->ciudad;

          //dd($id);
        

           $servicio = new servicio();
    
            
            $servicio->nombre_empresa = $nombre_empresa;
            $servicio->tipo_empresa = $tipo_empresa;
            $servicio->numero_accionistas = $numero_accionistas;
            $servicio->cantidad_capital = $cantidad_capital;
            $servicio->departamento = $departamento;
            $servicio->ciudad = $ciudad;
            //$servicio->suceso = $descripcion;
            //$servicio->soportes =  $soporte;
            //$servicio->fecha = $fecha;
            $servicio->tipo_servicio = 'CreacionEmpresa';
            $servicio->save();
          
          return redirect('home');
       }
    
        return view('crearempresa', compact('perfil'));
    }



     public function datacredito(Request $request )
    {
        // die(dd($request));

        

        $perfil = DB::table('users')->select('id', 'name', 'tipo_documento', 'numero_doc', 'telefono', 'email', 'created_at', 'estado', 'tipo_usuario')->where('id',Auth::user()->id)->get();

        if($request->isMethod('post')){

          //
          $fecha = request()->fecha;
          $descripcion = request()->descripcion;
          $soporte = request()->soporte;
          $departamento = request()->departamento;
          $ciudad = request()->ciudad;

          //dd($id);
        

           $servicio = new servicio();
    
            
        //$servicio->nombre_empresa = ;
        //$servicio->tipo_empresa = ;
        //$servicio->numero_accionistas = ;
        // $servicio->cantidad_capital = ;
            $servicio->departamento = $departamento;
            $servicio->ciudad = $ciudad;
            $servicio->suceso = $descripcion;
            $servicio->soportes =  $soporte;
            $servicio->fecha = $fecha;
            $servicio->tipo_servicio = 'datacredito';
            $servicio->save();
          
          return redirect('home');
       }
    
        return view('datacredito', compact('perfil'));
    }



}
