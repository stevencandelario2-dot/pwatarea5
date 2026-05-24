<?php
session_start();
// Seguridad: Solo el Lector puede entrar
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Reader') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Lector</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <span class="navbar-brand">Biblioteca UBE</span>
            <a href="logout.php" class="btn btn-outline-light btn-sm">Cerrar Sesión</a>
        </div>
    </nav>
    <div class="container">
        <div class="card p-4">
            <h2>Bienvenido, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Lector'; ?></h2>
            <p>Puedes explorar nuestro catálogo y solicitar préstamos.</p>
            <div class="list-group">
                <a href="catalogo.php" class="list-group-item list-group-item-action">Ver Catálogo de Libros</a>
            </div>
        </div>
    </div>
</body>
</html>