<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generarPDF($id)
    {
        // Lógica para generar el PDF
        $proyecto = project::findOrFail($id);
        // Por ejemplo, puedes usar la librería Dompdf para generar el PDF
        $pdf = \PDF::loadView('pdf.template', compact('proyecto'));

        return $pdf->download('archivo.pdf');
    }
    public function generarAllPDF()
    {
        // Lógica para generar el PDF
        $proyectos['proyectos']=Project::paginate(5);
        // Por ejemplo, puedes usar la librería Dompdf para generar el PDF
        $pdf = \PDF::loadView('pdf.templateAll',$proyectos);

        return $pdf->download('archivo.pdf');
    }
}
