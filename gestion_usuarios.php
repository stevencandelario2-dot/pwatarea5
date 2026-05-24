<?php
session_start();
// Seguridad: Solo el Administrador puede entrar
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Administrator') {
    header("Location: index.php");
    exit();
}
require 'includes/db.php';

// Consultar usuarios y sus roles
$sql = "SELECT u.id, u.username, u.email, r.name as role_name 
        FROM users u 
        JOIN roles r ON u.role_id = r.id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>Gestión de Usuarios</h2>
        <a href="dashboard_admin.php" class="btn btn-secondary mb-3">Volver al Dashboard</a>
        
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['role_name']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>