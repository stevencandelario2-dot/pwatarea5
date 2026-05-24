<?php
session_start();
require 'includes/db.php';

// Validar que los datos existan para evitar errores
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    die("Acceso denegado.");
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];

// Consultar usuario
$sql = "SELECT u.*, r.name as role_name 
        FROM users u 
        JOIN roles r ON u.role_id = r.id 
        WHERE u.email = '$email'";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    
    // Verificar contraseña
    if ($password == $user['password']) {
        // Guardamos los datos en la sesión
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role_name'];
        $_SESSION['username'] = $user['username']; // <--- ¡AQUÍ ESTÁ LA CORRECCIÓN!
        
        // Redirigir según el rol
        if ($user['role_name'] == 'Administrator') {
            header("Location: dashboard_admin.php");
        } elseif ($user['role_name'] == 'Librarian') {
            header("Location: dashboard_librarian.php");
        } else {
            header("Location: dashboard_reader.php");
        }
        exit(); // Siempre poner exit después de un header
    } else {
        echo "<script>alert('Contraseña incorrecta.'); window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('Usuario no encontrado.'); window.location='index.php';</script>";
}
?>