<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Categoria;
use App\Models\Producto;

class BodegueroController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        
        $query = Producto::query();

        // Filtrar por categoría si se proporciona
        if ($request->filled('categoria')) {
            $query->where('id_categoria', $request->categoria);
        }

        // Filtrar por nombre si se proporciona
        if ($request->filled('nombre')) {
            $query->where('nombre_prod', 'like', '%' . $request->nombre . '%');
        }

        $productos = $query->get();

        return view('bodeguero', ['categorias' => $categorias, 'productos' => $productos]);
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

    public function add(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|integer',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::find($request->id_producto);
        if ($producto) {
            $producto->stock += $request->cantidad;
            $producto->save();
            return redirect()->route('bodeguero.index')->with('success', 'Stock actualizado exitosamente.');
        }
        return redirect()->route('bodeguero.index')->with('error', 'Producto no encontrado.');
    }

    public function remove(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|integer',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::find($request->id_producto);
        if ($producto) {
            $producto->stock -= $request->cantidad;
            if ($producto->stock < 0) {
                $producto->stock = 0;  // Asegurarse de que el stock no sea negativo
            }
            $producto->save();
            return redirect()->route('bodeguero.index')->with('success', 'Stock actualizado exitosamente.');
        }
        return redirect()->route('bodeguero.index')->with('error', 'Producto no encontrado.');
    }
}
