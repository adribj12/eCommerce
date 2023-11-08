<?php

include('../modelos/usuarios.php');

header("Content-Type:Application/json");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    echo json_encode([
        'ok' => false,
        'msg' => 'Las consultas para ingresar usuarios deben ser realizadas por el método POST.'
    ]);
} else {
    $estaDefinidoNombre = 0;
    $estaDefinidoEmail = 0;
    $estaDefinidoContrasena = 0;
    $estaDefinidoTelefono = 0;
    $estaDefinidoPais = 0;
    $estaDefinidoFechaDeNacimiento = 0;
    $estaDefinidoFotoDePerfil = 0;
    $estaDefinidoRango = 0;
    $estaDefinidoFechaDeCreacion = 0;
    $estaDefinidoTema = 0;
    $estaDefinidoColorPreferido = 0;

    if (!isset($_POST['nombre'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "nombre".'
        ]);
    } else {
        $estaDefinidoNombre = 1;
    }

    if (!isset($_POST['email'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "email".'
        ]);
    } else {
        $estaDefinidoEmail = 1;
    }

    if (!isset($_POST['contrasena'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "contrasena".'
        ]);
    } else {
        $estaDefinidoContrasena = 1;
    }

    if (!isset($_POST['telefono'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "telefono".'
        ]);
    } else {
        $estaDefinidoTelefono = 1;
    }

    if (!isset($_POST['pais'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "pais".'
        ]);
    } else {
        $estaDefinidoPais = 1;
    }

    if (!isset($_POST['fechaDeNacimiento'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "fechaDeNacimiento".'
        ]);
    } else {
        $estaDefinidoFechaDeNacimiento = 1;
    }

    if (!isset($_POST['fotoDePerfil'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "fotoDePerfil".'
        ]);
    } else {
        $estaDefinidoFotoDePerfil = 1;
    }

    if (!isset($_POST['rango'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "rango".'
        ]);
    } else {
        $estaDefinidoRango = 1;
    }

    if (!isset($_POST['tema'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "tema".'
        ]);
    } else {
        $estaDefinidoTema = 1;
    }

    if (!isset($_POST['colorPreferido'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "colorPreferido".'
        ]);
    } else {
        $estaDefinidoColorPreferido = 1;
    }

    if (($estaDefinidoNombre == 1) && ($estaDefinidoEmail == 1) && ($estaDefinidoContrasena == 1) && ($estaDefinidoTelefono == 1) && ($estaDefinidoPais == 1) && ($estaDefinidoFechaDeNacimiento == 1) && ($estaDefinidoFotoDePerfil == 1) && ($estaDefinidoRango == 1) && ($estaDefinidoTema == 1) && ($estaDefinidoColorPreferido == 1)) {
        echo añadirUsuario($_POST['nombre'], $_POST['email'], $_POST['contrasena'], $_POST['telefono'], $_POST['pais'], $_POST['fechaDeNacimiento'], $_POST['fotoDePerfil'], $_POST['rango'], $_POST['tema'], $_POST['colorPreferido']);
    }
}

?>