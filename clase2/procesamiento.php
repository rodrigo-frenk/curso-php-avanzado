<?php

$respuesta = $_POST['nombre'];
$respuesta .= " " . $_POST['apellido'];
$respuesta .= ", " . $_POST['ocupacion'];
$respuesta .= ". " . $_POST['edad'] . " años.";

die( $respuesta );

?>