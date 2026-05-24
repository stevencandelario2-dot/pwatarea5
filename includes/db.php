<?php
$host = "sql303.infinityfree.com";
$user = "if0_41933437";
$pass = "pJVAsMllKHZAGR";
$db   = "if0_41933437_biblioteca";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");
?>