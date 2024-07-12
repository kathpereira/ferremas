<?php

namespace App\Http\Controllers;

use App\Models\Contador;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpWord\Shared\ZipArchive;
use Illuminate\Support\Facades\Hash;

class ContadorController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_cont' => 'required',
            'correo_cont' => 'required|email|unique:contador',
            'contrasena_cont' => 'required',
        ]);

        // Crea un nuevo contador con la contraseña encriptada
        Contador::create([
            'nombre_cont' => $request->nombre_cont,
            'correo_cont' => $request->correo_cont,
            'contrasena_cont' => Hash::make($request->contrasena_cont), // Encriptar la contraseña
        ]);

        // Redirecciona a donde desees después de crear el contador
        return redirect()->back()->with('Contador creado exitosamente.');
        //usarlo en caso de que la ruta asignada no funcione
        //return redirect()->route('adminCon')->with('success', 'Contador creado exitosamente.');
    }

    public function iniciarSesion(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'correo_cont' => 'required|email',
            'contrasena_cont' => 'required',
        ]);
    
        $contador = Contador::where('correo_cont', $request->correo_cont)->first();
    
        if (!$contador) {
            return back()->withErrors([
                'correo_cont' => 'Las credenciales proporcionadas son incorrectas.',
            ])->withInput();
        }
    
        // Verificar la contraseña encriptada
        if (Hash::check($request->contrasena_cont, $contador->contrasena_cont)) {
            // Autenticación exitosa
            // Guardar la información del contador en la sesión
            session()->put('id_contador', $contador->id_contador);
            session()->put('nombre_cont', $contador->nombre_cont); 
            return redirect('/contador'); 
        } else {
            // Autenticación fallida
            return back()->withErrors([
                'contrasena_cont' => 'La contraseña es incorrecta.',
            ])->withInput();
        }
    }

    public function generateReport(Request $request)
    {
        $request->validate([
            'formato' => 'required',
            'fecha' => 'required',
            'informe' => 'required',
        ]);

        $formato = $request->input('formato');
        $fecha = $request->input('fecha');
        $informe = $request->input('informe');
        $filename = "informe_" . date('Ymd_His');

        switch ($formato) {
            case 'PDF':
                $filename .= ".pdf";
                $options = new Options();
                $options->set('defaultFont', 'Arial');
                $dompdf = new Dompdf($options);
                $html = "<h1>Informe</h1><p>$informe</p><p>Fecha de Envío: $fecha</p>";
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                return $dompdf->stream($filename, ['Attachment' => true]);

            case 'Word':
                $filename .= ".docx";
                $phpWord = new PhpWord();
                $section = $phpWord->addSection();
                $section->addText("Informe", array('bold' => true, 'size' => 16));
                $section->addText($informe);
                $section->addText("Fecha de Envío: $fecha");

                $tempFile = tempnam(sys_get_temp_dir(), 'PHPWord') . '.docx';
                $writer = IOFactory::createWriter($phpWord, 'Word2007');
                $writer->save($tempFile);

                return response()->download($tempFile, $filename)->deleteFileAfterSend(true);
        }

        return redirect()->back()->with('error', 'Formato no soportado.');
    }
}
