<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Departamento::select(Departamento::raw('count(*) as total'), 'departamento as datox')
            ->groupBy('departamento')
            ->orderBy('departamento', 'desc')
            ->paginate(14);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
        /**
         * SELECT COUNT(municipio), municipio, departamento
         * FROM `departamento` 
         * WHERE departamento = 'SAN SALVADOR'
         * GROUP BY municipio
         * 
         * Departamento::select(Departamento::raw('count(*) as total'), 'municipio as datox')
         *->where('departamento', $request)
         *->groupBy('municipio')
         *->get();
         */

        $depts = Departamento::select(Departamento::raw('count(*) as total'), 'municipio as datox')
            ->where('departamento', $request)
            ->groupBy('municipio')
            ->orderBy('total','desc')
            ->get();

        return Response::json($depts, 200);
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
