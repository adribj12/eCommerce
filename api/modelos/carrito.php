<?php

header("Content-Type:Application/json");

function connectToDatabase() {
    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "dbecommerce";

    $conexion = new mysqli($serverName, $dBUsername, $dBPassword, $dBName);
    return $conexion;
}


function obtenerProductos() {
    $conexion = connectToDatabase();

    $query = "SELECT * FROM productos";
    $result = $conexion->query($query);
    
    $productos = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
    }

    $conexion->close();
    return $productos;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['verProductos'])) {
    $productos = obtenerProductos();
    $primeros_10_productos = array_slice($productos, 0, 10); 
    echo json_encode($primeros_10_productos);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregarAlCarrito'])) {
    $idProducto = $_POST['agregarAlCarrito'];

    echo json_encode(['message' => 'Producto agregado al carrito']);
    echo json_encode([]);
    
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['verProductosEnCarrito'])) {
    $idUsuario = $_GET['usuario'];

    $productosEnCarrito = verProductosEnCarrito($idUsuario);

    if (empty($productosEnCarrito)) {
        echo "El carrito está vacío.";
    } else {
        echo json_encode($productosEnCarrito);
    }
}
?>

