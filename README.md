markdown

# 📊 Sistema de Reportes de Ventas

Sistema web de generación de reportes empresariales desarrollado con Laravel. Permite visualizar, filtrar y exportar datos de ventas de manera interactiva y profesional.

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Status](https://img.shields.io/badge/Status-Activo-success?style=for-the-badge)
![Version](https://img.shields.io/badge/Version-1.0.0-blue?style=for-the-badge)
![License](https://img.shields.io/badge/License-MIT-yellow?style=for-the-badge)

## 🎯 Características

- ✅ **Dashboard interactivo** con métricas clave de ventas
- ✅ **Filtros dinámicos** por rango de fechas
- ✅ **Gráficos visuales** con Chart.js
- ✅ **Exportación a PDF** de reportes completos
- ✅ **Diseño responsive** adaptable a móviles y tablets
- ✅ **Arquitectura MVC** siguiendo mejores prácticas de Laravel

## 🖼️ Capturas de Pantalla

### Dashboard Principal
El sistema muestra estadísticas generales, filtros y tabla de detalles de ventas.

### Gráfico de Análisis
Visualización interactiva de ventas por producto usando Chart.js.

### Reporte PDF
Exportación profesional en formato PDF para imprimir o compartir.

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 12.0** - Framework PHP moderno
- **PHP 8.2** - Lenguaje de programación
- **Composer** - Gestor de dependencias

### Frontend
- **Blade Templates** - Motor de plantillas de Laravel
- **CSS3** - Estilos personalizados con gradientes y animaciones
- **Chart.js 4** - Librería de gráficos interactivos

### Librerías
- **barryvdh/laravel-dompdf** - Generación de PDFs
- **Carbon** - Manejo de fechas (incluido en Laravel)

## 📋 Requisitos Previos

- PHP >= 8.2
- Composer
- Laragon (recomendado) o XAMPP
- Navegador web moderno

## 🚀 Instalación

### Opción 1: Con Laragon (Recomendada)

1. **Descargar e instalar Laragon Full**
https://laragon.org/download/

2. **Clonar o extraer el proyecto**

```bash
   # Extraer en: C:\laragon\www\mi-reporte

Instalar dependencias
Abrir terminal en Laragon (click derecho → Terminal):

bash   composer install

Configurar la aplicación

bash   php artisan key:generate
   php artisan config:clear
   php artisan cache:clear

Iniciar Laragon
Click en "Start All" en Laragon
Acceder a la aplicación

   http://mi-reporte.test/reporte
Opción 2: Con servidor de desarrollo de Laravel

Instalar dependencias

bash   composer install

Configurar la aplicación

bash   php artisan key:generate

Iniciar servidor

bash   php artisan serve

Acceder a la aplicación

   http://127.0.0.1:8000/reporte
📖 Uso
Visualizar Reporte

Acceder a la URL principal
Visualizar las estadísticas generales en las tarjetas superiores
Revisar la tabla con el detalle de todas las transacciones

Filtrar por Fechas

Seleccionar fecha de inicio en el campo "Desde"
Seleccionar fecha fin en el campo "Hasta"
Hacer clic en "Aplicar Filtro"
Los datos se actualizarán automáticamente

Exportar a PDF

Hacer clic en el botón "📥 Descargar Reporte en PDF"
El archivo se descargará automáticamente
Nombre del archivo: reporte-ventas-YYYY-MM-DD.pdf

Analizar Gráficos

El gráfico de barras muestra ventas totales por producto
Pasar el cursor sobre las barras para ver valores exactos
Los colores ayudan a identificar rápidamente los productos

📁 Estructura del Proyecto
mi-reporte/
├── app/
│   └── Http/
│       └── Controllers/
│           └── ReporteController.php    # Lógica del reporte
├── resources/
│   └── views/
│       ├── reporte.blade.php           # Vista principal
│       └── reporte-pdf.blade.php       # Vista para PDF
├── routes/
│   └── web.php                         # Definición de rutas
├── public/                             # Archivos públicos
├── composer.json                       # Dependencias PHP
└── README.md                           # Este archivo
🔧 Configuración Adicional
Personalizar datos de ejemplo
Editar el método obtenerDatosVentas() en app/Http/Controllers/ReporteController.php:
phpprivate function obtenerDatosVentas()
{
    return [
        // Agregar o modificar datos aquí
        ['id' => 1, 'producto' => 'Nombre', 'cantidad' => 10, ...],
    ];
}
Cambiar colores del tema
Modificar las variables CSS en resources/views/reporte.blade.php:
css/* Buscar estos gradientes y cambiarlos */
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
🎨 Características Técnicas
Patrón MVC

Modelo: Datos de ejemplo en el controlador (preparado para BD)
Vista: Blade templates con CSS integrado
Controlador: ReporteController maneja toda la lógica

Seguridad

Protección CSRF de Laravel (para formularios)
Validación de parámetros de entrada
Sanitización automática de Blade templates

Performance

Caché de configuración de Laravel
Optimización de consultas (preparado para BD)
Assets CDN para Chart.js

🚧 Mejoras Futuras

 Integración con base de datos MySQL/PostgreSQL
 Sistema de autenticación de usuarios
 Reportes por categorías y productos
 Gráficos adicionales (línea, pastel, área)
 API REST para consumir datos
 Envío de reportes por email
 Exportación a Excel
 Dashboard en tiempo real con WebSockets

🤝 Contribuciones
Este es un proyecto de demostración educativa. Si deseas mejorarlo:

Fork el proyecto
Crea una rama para tu feature (git checkout -b feature/nueva-caracteristica)
Commit tus cambios (git commit -m 'Agregar nueva característica')
Push a la rama (git push origin feature/nueva-caracteristica)
Abre un Pull Request

📝 Notas de Desarrollo
Decisiones de diseño

Se optó por datos de ejemplo en lugar de BD para facilitar la demostración
CSS integrado en Blade para portabilidad (sin dependencias de build)
Chart.js desde CDN para evitar npm/webpack
DomPDF para máxima compatibilidad en generación de PDFs

Lecciones aprendidas

Laravel simplifica enormemente el desarrollo con PHP
Blade templates permiten código limpio y mantenible
La arquitectura MVC facilita la escalabilidad
El ecosistema de Laravel tiene soluciones para casi todo

📄 Licencia
Este proyecto es de código abierto y está disponible bajo la Licencia MIT.
👨‍💻 Autor
[JMGH]

Proyecto desarrollado como demostración de habilidades en Laravel
Octubre 2025

📧 Contacto
Para preguntas o sugerencias:

Email: josemiguel9302@gmai
LinkedIn: [https://www.linkedin.com/in/jose-miguel-gonzalez-hernandez-48945718a/]
GitHub: [JMondeda]


⭐ Si te gusta este proyecto, dale una estrella! ⭐
Desarrollado con ❤️ usando Laravel Framework

---
