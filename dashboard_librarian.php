<?php
session_start();
// Seguridad: Solo el Bibliotecario puede entrar
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Librarian') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Bibliotecario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-success mb-4">
        <div class="container">
            <span class="navbar-brand">Panel Bibliotecario</span>
            <a href="logout.php" class="btn btn-outline-light btn-sm">Cerrar Sesión</a>
        </div>
    </nav>
    <div class="container">
        <div class="card p-4">
            <h2>Bienvenido, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Bibliotecario'; ?></h2>
            <p>Gestiona el inventario de libros desde aquí.</p>
            <div class="list-group">
                <a href="gestion_libros.php" class="list-group-item list-group-item-action">Administrar Catálogo de Libros</a>
            </div>
        </div>
    </div>
</body>
</html>