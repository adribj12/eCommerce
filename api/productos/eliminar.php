<?php

include('../modelos/productos.php');

header("Content-Type:Application/json");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    echo json_encode([
        'ok' => false,
        'msg' => 'Las consultas para eliminar productos deben ser realizadas por el método POST.'
    ]);
} else {
    $estaDefinidoId = 0;

    if (!isset($_POST['id'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "id".'
        ]);
    } else {
        $estaDefinidoId = 1;
    }

    if ($estaDefinidoId == 1) {
        echo eliminarProducto($_POST['id']);
    }
}

?>