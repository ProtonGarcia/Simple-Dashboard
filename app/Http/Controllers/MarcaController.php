<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Marca::select(Marca::raw('count(*) as total'), 'marca as datox')
            ->groupBy('marca')
            ->orderBy('total', 'desc')

            ->get();
    }


    public function exportPdf()
    {

        $marcas = Marca::select(Marca::raw('count(*) as total'), 'marca as datox')
            ->groupBy('marca')
            ->orderBy('total', 'desc')
            ->get();

        $pdf = PDF::loadView('pdf.marcas', compact('marcas'));
        return $pdf->download('marcas-list.pdf');
        //return view('pdf.marcas', compact('marcas'));
    }
}
