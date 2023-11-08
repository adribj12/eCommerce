<?php

include('../modelos/productos.php');

header("Content-Type:Application/json");

if ($_SERVER['REQUEST_METHOD'] != "GET") {
    echo json_encode([
        'ok' => false,
        'msg' => 'Las consultas para obtener géneros deben ser realizadas por el método GET.'
    ]);
} else {
    if (isset($_GET['nombreGenero'])) {
        ucfirst('nombreGenero');
        echo obtenerProductoPorGenero($_GET['nombreGenero']);
    } 
}

?>