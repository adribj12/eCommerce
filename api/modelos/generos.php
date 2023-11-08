<?php

include('conn.php');

header("Content-Type:Application/json");

function obtenerGeneros($pagina, $cantidad) {
    $resultados = [];

    $esCorrectoPagina = 0;
    $esCorrectoCantidad = 0;

    if (isset($pagina)) {
        if (!is_numeric($pagina)) {
            return json_encode([
                'ok' => false,
                'msg' => 'El valor especificado en "pagina" debe ser de tipo numérico.'
            ]);
        } else {
            if ($pagina <= 0) {
                return json_encode([
                    'ok' => false,
                    'msg' => 'El valor especificado en "pagina" debe ser mayor o igual a 1.'
                ]);
            } else {
                $esCorrectoPagina = 1;
            }
        }
    }

    if (isset($cantidad)) {
        if (!is_numeric($cantidad)) {
            return json_encode([
                'ok' => false,
                'msg' => 'El valor especificado en "cantidad" debe ser de tipo numérico.'
            ]);
        } else {
            if ($cantidad <= 0) {
                return json_encode([
                    'ok' => false,
                    'msg' => 'El valor especificado en "cantidad" debe ser mayor o igual a 1.'
                ]);
            } else {
                $esCorrectoCantidad = 1;
            }
        }
    }

    if ($esCorrectoPagina == 1 && $esCorrectoCantidad == 1) {
        $consulta = mysqli_query(CONN, "SELECT * FROM Generos ORDER BY idGenero ASC LIMIT ".(($pagina - 1) * $cantidad).", ".$cantidad.";");
        if ($consulta == false) {
            return json_encode([
                'ok' => false,
                'msg' => 'La consulta MySQL tuvo un error.'
            ]);
        } else {
            while ($fila = mysqli_fetch_assoc($consulta)) {
                array_push($resultados, [
                    'id' => $fila['idGenero'],
                    'nombre' => $fila['nombreGenero']
                    ]);
            }

            if (empty($resultados)) {
                return json_encode([
                    'ok' => false,
                    'msg' => 'No se encontraron géneros en la página '.$pagina.'.'
                ]);
            } else {
                return json_encode($resultados);
            }
        }
    }

    if ($esCorrectoPagina == 0 && $esCorrectoCantidad == 1) {
        $consulta = mysqli_query(CONN, "SELECT * FROM Generos ORDER BY idGenero ASC LIMIT ".$cantidad.";");
        if ($consulta == false) {
            return json_encode([
                'ok' => false,
                'msg' => 'La consulta MySQL tuvo un error.'
            ]);
        } else {
            while ($fila = mysqli_fetch_assoc($consulta)) {
                array_push($resultados, [
                    'id' => $fila['idGenero'],
                    'nombre' => $fila['nombreGenero']
                    ]);
            }

            if (empty($resultados)) {
                return json_encode([
                    'ok' => false,
                    'msg' => 'No se encontraron géneros en la base de datos.'
                ]);
            } else {
                return json_encode($resultados);
            }
        }
    }

    if (($esCorrectoPagina == 1 && $esCorrectoCantidad == 0) || ($esCorrectoPagina == 0 && $esCorrectoCantidad == 0)) {
        $consulta = mysqli_query(CONN, "SELECT * FROM Generos ORDER BY idGenero ASC;");
        if ($consulta == false) {
            return json_encode([
                'ok' => false,
                'msg' => 'La consulta MySQL tuvo un error.'
            ]);
        } else {
            while ($fila = mysqli_fetch_assoc($consulta)) {
                array_push($resultados, [
                    'id' => $fila['idGenero'],
                    'nombre' => $fila['nombreGenero']
                    ]);
            }

            if (empty($resultados)) {
                return json_encode([
                    'ok' => false,
                    'msg' => 'No se encontraron géneros en la base de datos.'
                ]);
            } else {
                return json_encode($resultados);
            }
        }
    }
}

function obtenerGenerosPorID($id) {
    $resultados = [];

    if (!isset($id)) {
        return json_encode([
            'ok' => false,
            'msg' => 'Es obligatorio especificar un valor para "id".'
        ]);
    } else {
        if (!is_numeric($id)) {
            return json_encode([
                'ok' => false,
                'msg' => 'El valor especificado en "id" debe ser de tipo numérico.'
            ]);
        } else {
            if ($id <= 0) {
                return json_encode([
                    'ok' => false,
                    'msg' => 'El valor especificado en "id" debe ser mayor o igual a 1.'
                ]);
            } else {
                $consulta = mysqli_query(CONN, "SELECT * FROM Generos WHERE idGenero = ".$id.";");
                if ($consulta == false) {
                    return json_encode([
                        'ok' => false,
                        'msg' => 'La consulta MySQL tuvo un error.'
                    ]);
                } else {
                    while ($fila = mysqli_fetch_assoc($consulta)) {
                        array_push($resultados, [
                            'id' => $fila['idGenero'],
                            'nombre' => $fila['nombreGenero']
                            ]);
                    }

                    if (empty($resultados)) {
                        return json_encode([
                            'ok' => false,
                            'msg' => 'No se encontraron géneros con la id '.$id.'.'
                        ]);
                    } else {
                        return json_encode($resultados);
                    }
                }
            }
        }
    }
}

function modificarGenero($id, $campo, $valor) {
    $resultados = [];

    $esCorrectoId = 0;
    $esCorrectoCampo = 0;
    $esCorrectoValor = 0;

    if (!isset($id)) {
        return json_encode([
            'ok' => false,
            'msg' => 'Es obligatorio especificar un valor para "id".'
        ]);
    } else {
        if (!is_numeric($id)) {
            return json_encode([
                'ok' => false,
                'msg' => 'El valor especificado en "id" debe ser de tipo numérico.'
            ]);
        } else {
            if ($id <= 0) {
                return json_encode([
                    'ok' => false,
                    'msg' => 'El valor especificado en "id" debe ser mayor o igual a 1.'
                ]);
            } else {
                $consulta = mysqli_query(CONN, "SELECT * FROM Generos WHERE idGenero = ".$id.";");
                if ($consulta == false) {
                    return json_encode([
                        'ok' => false,
                        'msg' => 'La consulta MySQL tuvo un error.'
                    ]);
                } else {
                    while ($fila = mysqli_fetch_assoc($consulta)) {
                        array_push($resultados, [
                            'id' => $fila['idGenero'],
                            'nombre' => $fila['nombreGenero']
                            ]);
                    }

                    if (empty($resultados)) {
                        return json_encode([
                            'ok' => false,
                            'msg' => 'No se encontraron géneros con la id '.$id.'.'
                        ]);
                    } else {
                        unset($resultados);
                        $resultados = [];

                        $esCorrectoId = 1;
                    }
                }
            }
        }
    }

    if (!isset($campo)) {
        return json_encode([
            'ok' => false,
            'msg' => 'Es obligatorio especificar un valor para "campo".'
        ]);
    } else {
        if (is_numeric($campo)) {
            return json_encode([
                'ok' => false,
                'msg' => 'El valor especificado en "campo" debe ser de tipo texto.'
            ]);
        } else {
            if ($campo == "nombre") {
                $campo = "nombreGenero";
                $esCorrectoCampo = 1;
            } else {
                return json_encode([
                    'ok' => false,
                    'msg' => 'El valor especificado en "campo" debe ser alguno de los campos de los que se busca modificar su valor.'
                ]);
            }
        }
    }

    if (!isset($valor)) {
        return json_encode([
            'ok' => false,
            'msg' => 'Es obligatorio especificar un valor para "valor".'
        ]);
    } else {
        if (is_numeric($campo)) {
            return json_encode([
                'ok' => false,
                'msg' => 'Si se quiere modificar el campo de nombre el valor especificado en "valor" debe ser de tipo texto.'
            ]);
        } else {
            $esCorrectoValor = 1;
        }
    }

    if (($esCorrectoId == 1) && ($esCorrectoCampo == 1) && ($esCorrectoValor == 1)) {
        $consulta = mysqli_query(CONN, "UPDATE Generos SET ".$campo." = '".$valor."' WHERE idGenero = ".$id.";");
        if ($consulta == false) {
            return json_encode([
                'ok' => false,
                'msg' => 'La consulta MySQL tuvo un error.'
            ]);
        } else {
            $consulta = mysqli_query(CONN, "SELECT * FROM Generos WHERE idGenero = ".$id.";");
            if ($consulta == false) {
                return json_encode([
                    'ok' => false,
                    'msg' => 'La consulta MySQL tuvo un error.'
                ]);
            } else {
                while ($fila = mysqli_fetch_assoc($consulta)) {
                    array_push($resultados, [
                        'id' => $fila['idGenero'],
                        'nombre' => $fila['nombreGenero']
                        ]);
                }

                return json_encode($resultados);
            }
        }
    }
}

function añadirGenero($nombre) {
    $resultados = [];

    $esCorrectoNombre = 0;

    if (!isset($nombre)) {
        return json_encode([
            'ok' => false,
            'msg' => 'Es obligatorio especificar un valor para "nombre".'
        ]);
    } else {
        if (is_numeric($nombre)) { 
            return json_encode([
                'ok' => false,
                'msg' => 'El valor especificado en "nombre" debe ser de tipo texto.'
            ]);
        } else {
            $esCorrectoNombre = 1;
        }
    }

    if (($esCorrectoNombre == 1)) {
        $consulta = mysqli_query(CONN, "INSERT INTO Generos (nombreGenero) VALUES ('".$nombre."');");
        if ($consulta == false) {
            return json_encode([
                'ok' => false,
                'msg' => 'La consulta MySQL tuvo un error.'
            ]);
        } else {
            $consulta = mysqli_query(CONN, "SELECT * FROM Generos ORDER BY idGenero DESC LIMIT 0, 1;");
            if ($consulta == false) {
                return json_encode([
                    'ok' => false,
                    'msg' => 'La consulta MySQL tuvo un error.'
                ]);
            } else {
                while ($fila = mysqli_fetch_assoc($consulta)) {
                    array_push($resultados, [
                        'id' => $fila['idGenero'],
                        'nombre' => $fila['nombreGenero']
                        ]);
                }

                return json_encode($resultados);
            }
        }
    }
}

function eliminarGenero($id) {
    $resultados = [];

    if (!isset($id)) {
        return json_encode([
            'ok' => false,
            'msg' => 'Es obligatorio especificar un valor para "id".'
        ]);
    } else {
        if (!is_numeric($id)) {
            return json_encode([
                'ok' => false,
                'msg' => 'El valor especificado en "id" debe ser de tipo numérico.'
            ]);
        } else {
            if ($id <= 0) {
                return json_encode([
                    'ok' => false,
                    'msg' => 'El valor especificado en "id" debe ser mayor o igual a 1.'
                ]);
            } else {
                $consulta = mysqli_query(CONN, "SELECT * FROM Generos WHERE idGenero = ".$id.";");
                if ($consulta == false) {
                    return json_encode([
                        'ok' => false,
                        'msg' => 'La consulta MySQL tuvo un error.'
                    ]);
                } else {
                    while ($fila = mysqli_fetch_assoc($consulta)) {
                        array_push($resultados, [
                            'id' => $fila['idGenero'],
                            'nombre' => $fila['nombreGenero']
                            ]);
                    }

                    if (empty($resultados)) {
                        return json_encode([
                            'ok' => false,
                            'msg' => 'No se encontraron géneros con la id '.$id.'.'
                        ]);
                    } else {
                        unset($resultados);
                        $resultados = [];
                        $consulta = mysqli_query(CONN, "DELETE FROM Generos WHERE idGenero = ".$id.";");
                        if ($consulta == false) {
                            return json_encode([
                                'ok' => false,
                                'msg' => 'La consulta MySQL tuvo un error.'
                            ]);
                        } else {
                            $consulta = mysqli_query(CONN, "SELECT * FROM Generos WHERE idGenero = ".$id.";");
                            if ($consulta == false) {
                                return json_encode([
                                    'ok' => false,
                                    'msg' => 'La consulta MySQL tuvo un error.'
                                ]);
                            } else {
                                while ($fila = mysqli_fetch_assoc($consulta)) {
                                    array_push($resultados, [
                                        'id' => $fila['idGenero'],
                                        'nombre' => $fila['nombreGenero']
                                        ]);
                                }

                                if (!empty($resultados)) {
                                    return json_encode([
                                        'ok' => false,
                                        'msg' => 'No se pudo eliminar el género de id '.$id.'.'
                                    ]);
                                } else {
                                    return json_encode([
                                        'ok' => true,
                                        'msg' => 'Se eliminó el género de id '.$id.' con éxito.'
                                    ]);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}



?>