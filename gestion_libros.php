<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Librarian') {
    header("Location: index.php");
    exit();
}
require 'includes/db.php';

// Lógica para guardar el libro
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
    $titulo = mysqli_real_escape_string($conn, $_POST['title']);
    $autor = mysqli_real_escape_string($conn, $_POST['author']);
    $cantidad = (int)$_POST['quantity'];
    
    $sql = "INSERT INTO books (title, author, quantity) VALUES ('$titulo', '$autor', $cantidad)";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Libro agregado con éxito'); window.location='gestion_libros.php';</script>";
    }
}

// Consultar libros
$libros = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h2>Inventario de Libros</h2>
        
        <form method="POST" class="mb-4 p-3 bg-white border rounded">
            <h5>Agregar Nuevo Libro</h5>
            <div class="row">
                <div class="col"><input type="text" name="title" placeholder="Título" class="form-control" required></div>
                <div class="col"><input type="text" name="author" placeholder="Autor" class="form-control" required></div>
                <div class="col"><input type="number" name="quantity" placeholder="Cantidad" class="form-control" required></div>
                <div class="col"><button type="submit" class="btn btn-success">Agregar</button></div>
            </div>
        </form>

        <table class="table table-striped bg-white border">
            <thead class="table-dark">
                <tr><th>Título</th><th>Autor</th><th>Stock</th></tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($libros)) { ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="dashboard_librarian.php" class="btn btn-secondary">Volver al Panel</a>
    </div>
</body>
</html>