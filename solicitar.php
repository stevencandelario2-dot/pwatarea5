<?php
session_start();
require 'includes/db.php';

// Validar que el usuario sea Lector
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Reader') {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $date = date('Y-m-d');

    // 1. Verificar si hay stock disponible
    $check_stock = mysqli_query($conn, "SELECT quantity FROM books WHERE id = $book_id");
    $book = mysqli_fetch_assoc($check_stock);

    if ($book['quantity'] > 0) {
        // 2. Insertar la transacción
        $sql_trans = "INSERT INTO transactions (user_id, book_id, date_of_issue) VALUES ($user_id, $book_id, '$date')";
        mysqli_query($conn, $sql_trans);

        // 3. Restar 1 al inventario
        $sql_update = "UPDATE books SET quantity = quantity - 1 WHERE id = $book_id";
        mysqli_query($conn, $sql_update);

        echo "<script>alert('¡Libro solicitado con éxito!'); window.location='catalogo.php';</script>";
    } else {
        echo "<script>alert('Lo sentimos, no hay stock disponible.'); window.location='catalogo.php';</script>";
    }
}
?>