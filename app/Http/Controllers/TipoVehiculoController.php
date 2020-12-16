<?php

namespace App\Http\Controllers;

use App\Models\TipoVehiculo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class TipoVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TipoVehiculo::select(TipoVehiculo::raw('count(*) as total'),'tipo as datox')
        ->groupBy('tipo')
        ->orderBy('total','desc')
        ->get();
    }

    public function exportPdf(){
        $modelos = TipoVehiculo::select(TipoVehiculo::raw('count(*) as total'),'tipo as datox')
        ->groupBy('tipo')
        ->orderBy('total','desc')
        ->limit(500)
        ->get();

        $pdf = PDF::loadView('pdf.modelos',compact('modelos'));
        return $pdf->download('modelos.pdf');
    }
}
