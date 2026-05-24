<?php
// Conexión a la base de datos
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "biblioteca_ube";

$conn = mysqli_connect($host, $usuario, $password, $base_datos);

// Verificar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
// Configurar codificación a UTF-8 para evitar problemas con tildes
$conn->set_charset("utf8");
?>