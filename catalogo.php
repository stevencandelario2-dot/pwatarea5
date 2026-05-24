<?php
session_start();
// Seguridad: Solo los Lectores pueden acceder
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Reader') {
    header("Location: index.php");
    exit();
}
require 'includes/db.php';

// Consultar solo libros con stock mayor a 0
$libros = mysqli_query($conn, "SELECT * FROM books WHERE quantity > 0");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo - Biblioteca UBE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <span class="navbar-brand">Catálogo de Libros</span>
            <a href="dashboard_reader.php" class="btn btn-outline-light btn-sm">Volver al Panel</a>
        </div>
    </nav>

    <div class="container">
        <div class="card p-4 shadow-sm">
            <h3>Libros Disponibles</h3>
            <p>Selecciona el libro que deseas solicitar.</p>
            
            <table class="table table-hover mt-3">
                <thead class="table-primary">
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Stock</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($libros)) { ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><span class="badge bg-success"><?php echo $row['quantity']; ?> disponibles</span></td>
                        <td>
                            <a href="solicitar.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Solicitar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>