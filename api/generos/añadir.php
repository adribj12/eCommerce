<?php

include('../modelos/generos.php');

header("Content-Type:Application/json");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    echo json_encode([
        'ok' => false,
        'msg' => 'Las consultas para ingresar géneros deben ser realizadas por el método POST.'
    ]);
} else {
    $estaDefinidoNombre = 0;

    if (!isset($_POST['nombre'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "nombre".'
        ]);
    } else {
        $estaDefinidoNombre = 1;
    }

    if ($estaDefinidoNombre == 1) {
        echo añadirGenero($_POST['nombre']);
    }
}

?>