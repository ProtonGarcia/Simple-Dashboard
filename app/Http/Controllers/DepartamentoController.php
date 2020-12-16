<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade as PDF;

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
            ->orderBy('total', 'desc')
            ->get();
    }


    public function exportPdf()
    {
        $deptos = Departamento::select(Departamento::raw('count(*) as total'), 'departamento as datox')
            ->groupBy('departamento')
            ->orderBy('total', 'desc')
            ->get();


        $pdf = PDF::loadView('pdf.departamentos', compact('deptos'));
        return $pdf->download('departamentos.pdf');
        //return view('pdf.departamentos',compact('deptos'));
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
            ->orderBy('total', 'desc')
            ->get();

        return Response::json($depts, 200);
    }
}
