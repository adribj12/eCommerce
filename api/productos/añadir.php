<?php

include('../modelos/productos.php');

header("Content-Type:Application/json");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    echo json_encode([
        'ok' => false,
        'msg' => 'Las consultas para ingresar productos deben ser realizadas por el método POST.'
    ]);
} else {
    $estaDefinidoNombre = 0;
    $estaDefinidoDescripcion = 0;
    $estaDefinidoPrecio = 0;
    $estaDefinidoVendedor = 0;
    $estaDefinidoFechaDeSalida = 0;

    if (!isset($_POST['nombre'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "nombre".'
        ]);
    } else {
        $estaDefinidoNombre = 1;
    }

    if (!isset($_POST['descripcion'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "descripcion".'
        ]);
    } else {
        $estaDefinidoDescripcion = 1;
    }

    if (!isset($_POST['precio'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "precio".'
        ]);
    } else {
        $estaDefinidoPrecio = 1;
    }
    
    if (!isset($_POST['vendedor'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "vendedor".'
        ]);
    } else {
        $estaDefinidoVendedor = 1;
    }

    if (!isset($_POST['fechaDeSalida'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "fechaDeSalida".'
        ]);
    } else {
        $estaDefinidoFechaDeSalida = 1;
    }

    if (($estaDefinidoNombre == 1) && ($estaDefinidoDescripcion == 1) && ($estaDefinidoPrecio == 1) && ($estaDefinidoVendedor == 1) && ($estaDefinidoFechaDeSalida == 1)) {
        echo añadirProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['vendedor'], $_POST['fechaDeSalida']);
    }
}

?>