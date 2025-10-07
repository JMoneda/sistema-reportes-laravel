<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    /**
     * Obtiene los datos de ejemplo para el reporte
     * En un proyecto real, estos datos vendrían de una base de datos
     */
    private function obtenerDatosVentas()
    {
        return [
            ['id' => 1, 'producto' => 'Laptop HP Pavilion', 'cantidad' => 5, 'precio' => 15000, 'fecha' => '2025-10-01', 'categoria' => 'Computadoras'],
            ['id' => 2, 'producto' => 'Mouse Logitech MX', 'cantidad' => 20, 'precio' => 250, 'fecha' => '2025-10-02', 'categoria' => 'Accesorios'],
            ['id' => 3, 'producto' => 'Teclado Mecánico RGB', 'cantidad' => 15, 'precio' => 450, 'fecha' => '2025-10-03', 'categoria' => 'Accesorios'],
            ['id' => 4, 'producto' => 'Monitor LG 24" 4K', 'cantidad' => 8, 'precio' => 3500, 'fecha' => '2025-10-04', 'categoria' => 'Monitores'],
            ['id' => 5, 'producto' => 'Webcam HD 1080p', 'cantidad' => 12, 'precio' => 800, 'fecha' => '2025-10-05', 'categoria' => 'Accesorios'],
            ['id' => 6, 'producto' => 'Audífonos Bluetooth', 'cantidad' => 25, 'precio' => 350, 'fecha' => '2025-10-06', 'categoria' => 'Audio'],
            ['id' => 7, 'producto' => 'SSD Samsung 1TB', 'cantidad' => 10, 'precio' => 1200, 'fecha' => '2025-10-07', 'categoria' => 'Almacenamiento'],
        ];
    }

    /**
     * Muestra el reporte principal con filtros opcionales
     */
    public function index(Request $request)
    {
        // Obtener todos los datos
        $ventas = $this->obtenerDatosVentas();

        // Aplicar filtro por fecha de inicio si existe
        if ($request->filled('fecha_inicio')) {
            $ventas = array_filter($ventas, function($venta) use ($request) {
                return $venta['fecha'] >= $request->fecha_inicio;
            });
        }

        // Aplicar filtro por fecha fin si existe
        if ($request->filled('fecha_fin')) {
            $ventas = array_filter($ventas, function($venta) use ($request) {
                return $venta['fecha'] <= $request->fecha_fin;
            });
        }

        // Calcular totales y estadísticas
        $totalVentas = 0;
        $totalProductos = 0;
        $promedioVenta = 0;
        
        foreach ($ventas as $venta) {
            $subtotal = $venta['cantidad'] * $venta['precio'];
            $totalVentas += $subtotal;
            $totalProductos += $venta['cantidad'];
        }

        // Calcular promedio por transacción
        if (count($ventas) > 0) {
            $promedioVenta = $totalVentas / count($ventas);
        }

        return view('reporte', compact('ventas', 'totalVentas', 'totalProductos', 'promedioVenta'));
    }

    /**
     * Genera y descarga el reporte en formato PDF
     */
    public function descargarPDF()
    {
        $ventas = $this->obtenerDatosVentas();
        
        $totalVentas = 0;
        $totalProductos = 0;
        
        foreach ($ventas as $venta) {
            $totalVentas += $venta['cantidad'] * $venta['precio'];
            $totalProductos += $venta['cantidad'];
        }

        // Generar PDF usando la vista
        $pdf = PDF::loadView('reporte-pdf', compact('ventas', 'totalVentas', 'totalProductos'));
        
        // Configurar orientación y tamaño
        $pdf->setPaper('letter', 'portrait');
        
        return $pdf->download('reporte-ventas-' . date('Y-m-d') . '.pdf');
    }
}