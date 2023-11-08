<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "termo";
$database = "dbecommerce";

$conn = new mysqli($localhost, $termo, $dbecommerce);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$generos = $_POST['generos'];

$sql = "SELECT * FROM dbecommerce WHERE generos = '$generos'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $dbecommerce = array();
    
    while ($row = $result->fetch_assoc()) {
        $dbecommerce[] = $row;
    }
    
    // Devolver los productos en formato JSON
    echo json_encode($dbecommerce);
} else {
    echo "No se encontraron productos para la categoría: " . $generos;
}

$conn->close();
?>
