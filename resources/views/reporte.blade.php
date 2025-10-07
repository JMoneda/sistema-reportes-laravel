<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reportes - Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }
        
        .header h1 {
            font-size: 2.8em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
        
        .header p {
            font-size: 1.2em;
            opacity: 0.95;
        }

        .actions {
            text-align: center;
            padding: 25px;
            background: #f8f9ff;
            border-bottom: 2px solid #e0e0e0;
        }

        .btn-pdf {
            display: inline-block;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 15px 35px;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            box-shadow: 0 5px 20px rgba(245, 87, 108, 0.4);
            transition: all 0.3s;
            font-size: 1.1em;
        }

        .btn-pdf:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(245, 87, 108, 0.6);
        }
        
        .content {
            padding: 35px;
        }

        /* Filtros */
        .filters {
            background: #f8f9ff;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
            border: 2px solid #e8eaf6;
        }

        .filters h3 {
            margin-bottom: 20px;
            color: #333;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-form {
            display: flex;
            gap: 15px;
            align-items: end;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 1;
            min-width: 200px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #666;
            font-size: 0.95em;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
            transition: all 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn-filter {
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1em;
            transition: all 0.3s;
        }

        .btn-filter:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-clear {
            padding: 12px 30px;
            background: #f0f0f0;
            color: #333;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-clear:hover {
            background: #e0e0e0;
        }
        
        /* Estadísticas */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 35px;
        }
        
        .stat-card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card:nth-child(2) {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .stat-card:nth-child(3) {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }
        
        .stat-card h3 {
            font-size: 0.95em;
            opacity: 0.95;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 600;
        }
        
        .stat-card p {
            font-size: 2.5em;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .stat-card .subtitle {
            font-size: 0.85em;
            opacity: 0.9;
            margin-top: 8px;
        }
        
        /* Tabla */
        .table-section {
            margin-bottom: 40px;
        }

        .section-title {
            margin-bottom: 20px;
            color: #333;
            font-size: 1.8em;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        
        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        th, td {
            padding: 18px 15px;
            text-align: left;
        }
        
        th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85em;
            letter-spacing: 1px;
        }
        
        tbody tr {
            border-bottom: 1px solid #f0f0f0;
            transition: all 0.3s;
        }
        
        tbody tr:hover {
            background: #f8f9ff;
            transform: scale(1.01);
        }
        
        tbody tr:last-child {
            border-bottom: none;
        }
        
        .total-row {
            background: #f8f9ff !important;
            font-weight: bold;
            font-size: 1.15em;
            border-top: 3px solid #667eea;
        }
        
        .badge {
            display: inline-block;
            padding: 6px 14px;
            background: #667eea;
            color: white;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 600;
        }

        .category-badge {
            display: inline-block;
            padding: 4px 12px;
            background: #e3f2fd;
            color: #1976d2;
            border-radius: 15px;
            font-size: 0.85em;
            font-weight: 500;
        }

        /* Gráfico */
        .chart-section {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .chart-section h2 {
            margin-bottom: 25px;
            color: #333;
            text-align: center;
            font-size: 1.8em;
        }
        
        .footer {
            text-align: center;
            padding: 25px;
            color: #666;
            font-size: 0.95em;
            background: #f8f9ff;
            border-top: 2px solid #e0e0e0;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2em;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .filter-form {
                flex-direction: column;
            }

            .form-group {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📊 Sistema de Reportes Empresarial</h1>
            <p>Dashboard de Análisis de Ventas - {{ date('F Y') }}</p>
        </div>

        <div class="actions">
            <a href="/reporte/pdf" class="btn-pdf">📥 Descargar Reporte en PDF</a>
        </div>
        
        <div class="content">
            <!-- Filtros -->
            <div class="filters">
                <h3>🔍 Filtrar por Rango de Fechas</h3>
                <form method="GET" action="/reporte" class="filter-form">
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de Inicio:</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ request('fecha_inicio') }}">
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">Fecha de Fin:</label>
                        <input type="date" id="fecha_fin" name="fecha_fin" value="{{ request('fecha_fin') }}">
                    </div>
                    <button type="submit" class="btn-filter">Aplicar Filtro</button>
                    <a href="/reporte" class="btn-clear">Limpiar</a>
                </form>
            </div>

            <!-- Estadísticas -->
            <div class="stats">
                <div class="stat-card">
                    <h3>Total en Ventas</h3>
                    <p>${{ number_format($totalVentas, 2) }}</p>
                    <div class="subtitle">Ingresos generados</div>
                </div>
                <div class="stat-card">
                    <h3>Productos Vendidos</h3>
                    <p>{{ $totalProductos }}</p>
                    <div class="subtitle">Unidades totales</div>
                </div>
                <div class="stat-card">
                    <h3>Promedio por Venta</h3>
                    <p>${{ number_format($promedioVenta, 2) }}</p>
                    <div class="subtitle">Ticket promedio</div>
                </div>
            </div>
            
            <!-- Tabla -->
            <div class="table-section">
                <h2 class="section-title">📋 Detalle de Transacciones</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Categoría</th>
                                <th>Cantidad</th>
                                <th>Precio Unit.</th>
                                <th>Subtotal</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ventas as $venta)
                            <tr>
                                <td><span class="badge">{{ $venta['id'] }}</span></td>
                                <td><strong>{{ $venta['producto'] }}</strong></td>
                                <td><span class="category-badge">{{ $venta['categoria'] }}</span></td>
                                <td>{{ $venta['cantidad'] }} unidades</td>
                                <td>${{ number_format($venta['precio'], 2) }}</td>
                                <td><strong>${{ number_format($venta['cantidad'] * $venta['precio'], 2) }}</strong></td>
                                <td>{{ \Carbon\Carbon::parse($venta['fecha'])->format('d/m/Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 30px; color: #999;">
                                    No se encontraron resultados para el filtro seleccionado
                                </td>
                            </tr>
                            @endforelse
                            @if(count($ventas) > 0)
                            <tr class="total-row">
                                <td colspan="5" style="text-align: right;">TOTAL GENERAL:</td>
                                <td colspan="2"><strong>${{ number_format($totalVentas, 2) }}</strong></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Gráfico -->
            @if(count($ventas) > 0)
            <div class="chart-section">
                <h2>📈 Análisis Visual de Ventas</h2>
                <canvas id="ventasChart"></canvas>
            </div>
            @endif
        </div>
        
        <div class="footer">
            <p><strong>Sistema desarrollado con Laravel Framework</strong></p>
            <p>Generado el {{ date('d/m/Y H:i:s') }} | Tecnología: PHP 8.x + Laravel 11</p>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        @if(count($ventas) > 0)
        const ctx = document.getElementById('ventasChart').getContext('2d');
        const ventasChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($ventas as $venta)
                        '{{ $venta['producto'] }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Ventas Totales ($)',
                    data: [
                        @foreach($ventas as $venta)
                            {{ $venta['cantidad'] * $venta['precio'] }},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(102, 126, 234, 0.8)',
                        'rgba(118, 75, 162, 0.8)',
                        'rgba(240, 147, 251, 0.8)',
                        'rgba(245, 87, 108, 0.8)',
                        'rgba(79, 172, 254, 0.8)',
                        'rgba(67, 233, 123, 0.8)',
                        'rgba(255, 183, 77, 0.8)',
                    ],
                    borderWidth: 0,
                    borderRadius: 10,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        },
                        callbacks: {
                            label: function(context) {
                                return 'Ventas: $' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
        @endif
    </script>
</body>
</html>