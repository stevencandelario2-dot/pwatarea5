<?php
session_start();
if ($_SESSION['role'] != 'Administrator') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark p-3">
        <a class="navbar-brand">Panel Administrador</a>
        <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
    </nav>
    <div class="container mt-4">
        <h2>Bienvenido, <?php echo $_SESSION['username']; ?></h2>
        <p>Tienes acceso total para gestionar usuarios y ver transacciones.</p>
        </div>
</body>
</html>