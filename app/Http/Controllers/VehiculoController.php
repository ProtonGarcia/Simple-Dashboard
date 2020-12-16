<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;


class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get

        return Vehiculo::
        join('marcas','vehiculos.idmarca', '=' , 'marcas.idMARCAS')
        ->join('fechas', 'vehiculos.idfechas', '=', 'fechas.idFECHAS')
        ->join('tipoveiculo', 'vehiculos.idTipoVehiculo', '=', 'tipoveiculo.idTipoVeiculo')
        ->join('departamento', 'vehiculos.idDepartamento', '=','departamento.idDepartamento')
        ->select('marcas.marca as Marca','marcas.cilindraje as Cilindraje',
        'fechas.mes as Mes', 'fechas.semestre',
        'tipoveiculo.tipo as Tipo', 'tipoveiculo.capacidad as Capacidad',
        'vehiculos.año as Year', 'vehiculos.tipoCombustible as Tipo conbustible',
        'departamento.departamento', 'departamento.municipio'
        )
        ->simplePaginate(10);
    }

    public function show($nombreVehiculo)
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
}
