<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformeController extends Controller
{
    public function store(Request $request)
    {
        // Obtener los datos del formulario
        $fecha_documentacion = $request->input('fecha_documentacion');
        $motivo_informe = $request->input('motivo_informe');

        // Procesar los datos y generar el informe

        // Redireccionar a una página de confirmación con un mensaje de éxito
        return redirect()->route('informe.confirmacion')->with('success', 'El informe ha sido generado exitosamente.');
    }
}
