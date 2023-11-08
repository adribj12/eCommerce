<?php

include('../modelos/generos.php');

header("Content-Type:Application/json");

if ($_SERVER['REQUEST_METHOD'] != "GET") {
    echo json_encode([
        'ok' => false,
        'msg' => 'Las consultas para obtener géneros deben ser realizadas por el método GET.'
    ]);
} else {
    if (isset($_GET['id'])) {
        echo obtenerGenerosPorID($_GET['id']);
    } else {
        echo obtenerGeneros((isset($_GET['pagina']) ? $_GET['pagina'] : 1), (isset($_GET['cantidad']) ? $_GET['cantidad'] : 1));
    } 
}

?>