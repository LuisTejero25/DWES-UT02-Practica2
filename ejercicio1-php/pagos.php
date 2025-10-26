<?php
// Array asociativo que contiene los nombres de los meses del año 2025.
// Las claves tienen el formato "AAAA-MM" como exige la práctica.
$meses = [
    "2025-01" => "Enero", "2025-02" => "Febrero", "2025-03" => "Marzo",
    "2025-04" => "Abril", "2025-05" => "Mayo", "2025-06" => "Junio",
    "2025-07" => "Julio", "2025-08" => "Agosto", "2025-09" => "Septiembre",
    "2025-10" => "Octubre", "2025-11" => "Noviembre", "2025-12" => "Diciembre"
];
// Array multidimensional que contiene la información de varios socios.
// Cada socio está identificado por un ID único y tiene sus datos personales.
// Además, se inicializa un array vacío para almacenar sus pagos mensuales.
$socios = [
    1 => [
        "id" => 1,
        "nombre" => "Luis",
        "apellidos" => "Tejero",
        "dni" => "12345678A",
        "email" => "luis@fpvirtualaragon.es",
        "telefono" => "600123456",
        "pagos" => []
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

// Se elimina la referencia activa para evitar efectos secundarios.
unset($socio); 
?>
