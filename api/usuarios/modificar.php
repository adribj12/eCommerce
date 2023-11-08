<?php

include('../modelos/usuarios.php');

header("Content-Type:Application/json");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    echo json_encode([
        'ok' => false,
        'msg' => 'Las consultas para modificar usuarios deben ser realizadas por el método POST.'
    ]);
} else {
    $estaDefinidoId = 0;
    $estaDefinidoCampo = 0;
    $estaDefinidoValor = 0;

    if (!isset($_POST['id'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "id".'
        ]);
    } else {
        $estaDefinidoId = 1;
    }

    if (!isset($_POST['campo'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "campo".'
        ]);
    } else {
        $estaDefinidoCampo = 1;
    }

    if (!isset($_POST['valor'])) {
        echo json_encode([
            'ok' => false,
            'msg' => 'Se debe especificar un valor en el campo "valor".'
        ]);
    } else {
        $estaDefinidoValor = 1;
    }

    if (($estaDefinidoId == 1) && ($estaDefinidoCampo == 1) && ($estaDefinidoValor == 1)) {
        echo modificarUsuario($_POST['id'], $_POST['campo'], $_POST['valor']);
    }
}

?>