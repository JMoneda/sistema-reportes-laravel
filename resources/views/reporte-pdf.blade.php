<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid #667eea;
        }
        .header h1 {
            color: #667eea;
            margin-bottom: 5px;
        }
        .stats {
            display: table;
            width: 100%;
            margin-bottom: 25px;
        }
        .stat-box {
            display: table-cell;
            width: 33%;
            text-align: center;
            padding: 15px;
            background: #f8f9ff;
            border: 2px solid #e0e0e0;
        }
        .stat-box h3 {
            font-size: 12px;
            color: #666;
            margin-bottom: 5px;
        }
        .stat-box p {
            font-size: 20px;
            font-weight: bold;
            color: #667eea;
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background: #667eea;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background: #f8f9ff;
        }
        .total-row {
            background: #e8eaf6 !important;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            font-size: 11px;
            color: #666;
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>REPORTE DE VENTAS</h1>
        <p>Generado el {{ date('d/m/Y H:i:s') }}</p>
    </div>

    <div class="stats">
        <div class="stat-box">
            <h3>TOTAL VENTAS</h3>
            <p>${{ number_format($totalVentas, 2) }}</p>
        </div>
        <div class="stat-box">
            <h3>PRODUCTOS VENDIDOS</h3>
            <p>{{ $totalProductos }}</p>
        </div>
        <div class="stat-box">
            <h3>TRANSACCIONES</h3>
            <p>{{ count($ventas) }}</p>
        </div>
    </div>

    <h2 style="color: #667eea; margin-bottom: 15px;">Detalle de Ventas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
            <tr>
                <td>{{ $venta['id'] }}</td>
                <td>{{ $venta['producto'] }}</td>
                <td>{{ $venta['cantidad'] }}</td>
                <td>${{ number_format($venta['precio'], 2) }}</td>
                <td>${{ number_format($venta['cantidad'] * $venta['precio'], 2) }}</td>
                <td>{{ \Carbon\Carbon::parse($venta['fecha'])->format('d/m/Y') }}</td>
            </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="4" style="text-align: right;"><strong>TOTAL GENERAL:</strong></td>
                <td colspan="2"><strong>${{ number_format($totalVentas, 2) }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p><strong>Sistema de Reportes Empresarial</strong></p>
        <p>Desarrollado con Laravel Framework | PHP 8.x</p>
    </div>
</body>
</html>