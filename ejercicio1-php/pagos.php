<?php
// ARRAY INDEXADO
// Un array indexado usa claves numéricas automáticamente asignadas.
// Se define con la sintaxis: array(valor1, valor2, valor3)
// Ejemplo teórico: $dias = ["Lunes", "Martes", "Miércoles"];
// En esta práctica no se utiliza porque se requiere estructura asociativa por mes y por socio.

// ARRAY ASOCIATIVO
// Array asociativo que contiene los nombres de los meses del año 2025.
// Se define con la sintaxis: array("clave1" => valor1, "clave2" => valor2)
// Las claves tienen el formato "AAAA-MM" como exige la práctica.
$meses = [
    "2025-01" => "Enero", "2025-02" => "Febrero", "2025-03" => "Marzo",
    "2025-04" => "Abril", "2025-05" => "Mayo", "2025-06" => "Junio",
    "2025-07" => "Julio", "2025-08" => "Agosto", "2025-09" => "Septiembre",
    "2025-10" => "Octubre", "2025-11" => "Noviembre", "2025-12" => "Diciembre"
];
// ARRAY MULTIDIMENSIONAL ASOCIATIVO
// Array multidimensional que contiene la información de varios socios.
// Cada socio está identificado por un ID único y tiene sus datos personales.
// y otro array interno llamado "pagos" que se rellenará dinámicamente.
// Además, se inicializa un array vacío para almacenar sus pagos mensuales.
$socios = [
    1 => [
        "id" => 1,
        "nombre" => "Luis",
        "apellidos" => "Tejero",
        "dni" => "12345678A",
        "email" => "luis@fpvirtualaragon.es",
        "telefono" => "600123456",
        "pagos" => []// Este será un array asociativo de pagos por mes
    ],
    2 => [
        "id" => 2,
        "nombre" => "Ana",
        "apellidos" => "Martínez",
        "dni" => "87654321B",
        "email" => "ana@fpvirtualaragon.es",
        "telefono" => "600654321",
        "pagos" => []
    ],
    3 => [
        "id" => 3,
        "nombre" => "Miguel",
        "apellidos" => "López",
        "dni" => "11223344C",
        "email" => "miguel@fpvirtualaragon.es",
        "telefono" => "600112233",
        "pagos" => []
    ],
    4 => [
        "id" => 4,
        "nombre" => "Arturo",
        "apellidos" => "Ruiz",
        "dni" => "55667788D",
        "email" => "arturo@fpvirtualaragon.es",
        "telefono" => "600556677",
        "pagos" => []
    ]
];

// Bucle que recorre cada socio por referencia para modificar directamente su array.
// Se genera el array de pagos mensuales para cada uno de ellos.
foreach ($socios as &$socio) {
   // Bucle que recorre cada mes del año.
    foreach ($meses as $clave => $nombreMes) {
       // Se asigna aleatoriamente el estado del pago: "Pagado" o "Pendiente".
        $estado = rand(0, 1) ? "Pagado" : "Pendiente";
         // Si el estado es "Pagado", se genera una fecha aleatoria dentro del mes.
        // Si es "Pendiente", se asigna null como fecha.
        $fecha = $estado === "Pagado" ? "$clave-" . rand(1, 28) : null;

       // Se añade el pago al array del socio, con todos los datos requeridos.
        $socio["pagos"][$clave] = [
            "mes" => $nombreMes,    // Nombre del mes
            "importe" => 20,        // Importe fijo de la cuota
            "estado" => $estado,    // Estado del pago
            "fecha" => $fecha       // Fecha de pago o null
        ];
    }
}

// Se elimina la referencia activa para evitar efectos secundarios
unset($socio); 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de Pagos</title>
    <style>
       /* Estilos básicos para mejorar la presentación de la tabla */
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .pagado { background-color: #d4edda; }     /* Color verde para pagos realizados */
        .pendiente { background-color: #f8d7da; }  /* Color rojo para pagos pendientes */
    </style>
</head>
<body>
    <!-- Título principal de la página -->
    <h1>Listado de Socios y Pagos Mensuales</h1>
    <!-- Bucle que recorre cada socio y muestra sus datos -->
    <?php foreach ($socios as $socio): ?>
        <h2><?= $socio["nombre"] . " " . $socio["apellidos"] ?> (ID: <?= $socio["id"] ?>)</h2>
        <!-- Datos personales del socio -->
        <p><strong>DNI:</strong> <?= $socio["dni"] ?> |
           <strong>Email:</strong> <?= $socio["email"] ?> |
           <strong>Teléfono:</strong> <?= $socio["telefono"] ?></p>

        <!-- Tabla que muestra los pagos mensuales del socio -->
        <table>
            <tr>
                <th>Mes</th>
                <th>Importe (€)</th>
                <th>Estado</th>
                <th>Fecha de Pago</th>
            </tr>
             <!-- Bucle que recorre los pagos del socio -->
            <?php foreach ($socio["pagos"] as $clave => $pago): ?>
                <tr class="<?= strtolower($pago["estado"]) ?>">
                     <!-- Nombre del mes -->
                    <td><?= $pago["mes"] ?></td>
                    <!-- Importe de la cuota mensual -->
                    <td><?= number_format($pago["importe"], 2, ',', '.') ?></td>
                     <!-- Estado del pago: Pagado o Pendiente -->
                    <td><?= $pago["estado"] ?></td>
                     <!-- Fecha de pago si está pagado, o guion si está pendiente -->
                    <td><?= $pago["fecha"] ?? "—" ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <!-- Separador visual entre socios -->
        <hr>
    <?php endforeach; ?>
</body>
</html>