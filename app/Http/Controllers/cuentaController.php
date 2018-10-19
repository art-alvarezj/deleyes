<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use App\cuenta;
use App\transaccion;
class cuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cuentas = new cuenta();
       $cuentas = $cuentas->select('saldo')->where('id_usuario', Auth::user()->id )->get('saldo');
       $saldo = $cuentas[0]['saldo'];
       return view('consultaCuenta', compact('saldo'));       
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
       $cuentas = new cuenta();
       $cuentas = $cuentas->select('saldo','id')->where('id_usuario', Auth::user()->id )->first('saldo');
      
       $saldo = $cuentas['saldo']; 
       $idCuentaCliente = $cuentas['id']; 
       if($request->isMethod('post')){
       $name = $request->input('consignarMonto');
       $nuevoSaldo = $saldo + $name;
       $cuentas->find($idCuentaCliente);
       $cuentas->saldo = $nuevoSaldo;
       $cuentas->save();

       $transaccion = new transaccion();
       $transaccion->name='Moviemiento Consignacion Virtual';
       $transaccion->id_cuenta=$idCuentaCliente;
       $transaccion->id_sucursal='Virtual UMB'; 
       $transaccion->monto=$name; 
       $transaccion->save();
       return redirect()->route('consignarCuenta');
       }
       return view('consignarCuenta', compact('saldo'));  
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
    public function edit(Request $request)
    {

       $cuentas = new cuenta();
       $cuentas = $cuentas->select('saldo','id')->where('id_usuario', Auth::user()->id )->first('saldo');
      
       $saldo = $cuentas['saldo']; 
       $idCuentaCliente = $cuentas['id']; 
       if($request->isMethod('post')){
       $name = $request->input('retirarMonto');
       $nuevoSaldo = $saldo - $name;
       $cuentas->find($idCuentaCliente);
       $cuentas->saldo = $nuevoSaldo;
       $cuentas->save();

       $transaccion = new transaccion();
       $transaccion->name='Moviemiento Retiro Virtual';
       $transaccion->id_cuenta=$idCuentaCliente;
       $transaccion->id_sucursal='Virtual UMB'; 
       $transaccion->monto=$name; 
       $transaccion->save();
       return redirect()->route('retirosCuenta');
       }
       return view('retirosCuenta', compact('saldo'));     
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
}
